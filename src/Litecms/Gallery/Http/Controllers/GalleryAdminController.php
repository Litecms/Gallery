<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Gallery\Http\Requests\GalleryAdminRequest;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Models\Gallery;

/**
 * Admin web controller class.
 */
class GalleryAdminController extends Basecontroller
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    public $guard = 'admin.web';

    /**
     * The home page route of admin.
     *
     * @var string
     */
    public $home = 'admin';

    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->repository = $gallery;
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        parent::__construct();
    }

    /**
     * Display a list of gallery.
     *
     * @return Response
     */
    public function index(GalleryAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        if ($request->wantsJson()) {
            $galleries = $this->repository->setPresenter('\\Litecms\\Gallery\\Repositories\\Presenter\\GalleryListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('id', 'DESC');
                })->paginate($pageLimit);
            $galleries['recordsTotal'] = $galleries['meta']['pagination']['total'];
            $galleries['recordsFiltered'] = $galleries['meta']['pagination']['total'];
            $galleries['request'] = $request->all();
            return response()->json($galleries, 200);

        }

        $this->theme->prependTitle(trans('gallery::gallery.names') . ' :: ');
        return $this->theme->of('gallery::admin.gallery.index')->render();
    }

    /**
     * Display gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return Response
     */
    public function show(GalleryAdminRequest $request, Gallery $gallery)
    {

        if (!$gallery->exists) {
            return response()->view('gallery::admin.gallery.new', compact('gallery'));
        }

        Form::populate($gallery);
        return response()->view('gallery::admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for creating a new gallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(GalleryAdminRequest $request)
    {

        $gallery = $this->repository->newInstance([]);

        Form::populate($gallery);

        return response()->view('gallery::admin.gallery.create', compact('gallery'));

    }

    /**
     * Create new gallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(GalleryAdminRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $gallery = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('gallery::gallery.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/gallery/gallery/' . $gallery->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }

    }

    /**
     * Show gallery for editing.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return Response
     */
    public function edit(GalleryAdminRequest $request, Gallery $gallery)
    {
        Form::populate($gallery);
        return response()->view('gallery::admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return Response
     */
    public function update(GalleryAdminRequest $request, Gallery $gallery)
    {
        try {

            $attributes = $request->all();

            $gallery->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('gallery::gallery.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/gallery/gallery/' . $gallery->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/gallery/gallery/' . $gallery->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the gallery.
     *
     * @param Model   $gallery
     *
     * @return Response
     */
    public function destroy(GalleryAdminRequest $request, Gallery $gallery)
    {

        try {

            $t = $gallery->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('gallery::gallery.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/gallery/gallery/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/gallery/gallery/' . $gallery->getRouteKey()),
            ], 400);
        }

    }

}
