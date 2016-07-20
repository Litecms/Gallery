<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\AdminApiController as AdminController;
use Litecms\Gallery\Http\Requests\GalleryAdminApiRequest;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Models\Gallery;

/**
 * Admin API controller class.
 */
class GalleryAdminApiController extends AdminController
{
    /**
     * Initialize gallery controller.
     *
     * @param type GalleryRepositoryInterface $gallery
     *
     * @return type
     */
    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->repository = $gallery;
        parent::__construct();
    }

    /**
     * Display a list of gallery.
     *
     * @return json
     */
    public function index(GalleryAdminApiRequest $request)
    {
        $galleries = $this->repository
            ->setPresenter('\\Litecms\\Gallery\\Repositories\\Presenter\\GalleryListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $galleries['code'] = 2000;
        return response()->json($galleries)
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display gallery.
     *
     * @param Request $request
     * @param Model   Gallery
     *
     * @return Json
     */
    public function show(GalleryAdminApiRequest $request, Gallery $gallery)
    {
        $gallery         = $gallery->presenter();
        $gallery['code'] = 2001;
        return response()->json($gallery)
            ->setStatusCode(200, 'SHOW_SUCCESS');

    }

    /**
     * Show the form for creating a new gallery.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(GalleryAdminApiRequest $request, Gallery $gallery)
    {
        $gallery         = $gallery->presenter();
        $gallery['code'] = 2002;
        return response()->json($gallery)
            ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new gallery.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(GalleryAdminApiRequest $request)
    {
        try {
            $attributes            = $request->all();
            $attributes['user_id'] = user_id('admin.api');
            $gallery               = $this->repository->create($attributes);
            $gallery               = $gallery->presenter();
            $gallery['code']       = 2004;

            return response()->json($gallery)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');

        }
    }

    /**
     * Show gallery for editing.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return json
     */
    public function edit(GalleryAdminApiRequest $request, Gallery $gallery)
    {
        $gallery         = $gallery->presenter();
        $gallery['code'] = 2003;
        return response()->json($gallery)
            ->setStatusCode(200, 'EDIT_SUCCESS');
    }

    /**
     * Update the gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return json
     */
    public function update(GalleryAdminApiRequest $request, Gallery $gallery)
    {
        try {

            $attributes = $request->all();

            $gallery->update($attributes);
            $gallery         = $gallery->presenter();
            $gallery['code'] = 2005;

            return response()->json($gallery)
                ->setStatusCode(201, 'UPDATE_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return json
     */
    public function destroy(GalleryAdminApiRequest $request, Gallery $gallery)
    {

        try {

            $t = $gallery->delete();

            return response()->json([
                'message' => trans('messages.success.delete', ['Module' => trans('gallery::gallery.name')]),
                'code'    => 2006,
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
