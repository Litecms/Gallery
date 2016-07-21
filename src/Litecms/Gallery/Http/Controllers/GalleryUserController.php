<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Gallery\Http\Requests\GalleryUserRequest;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Models\Gallery;

class GalleryUserController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';

    /**
     * The home page route of user.
     *
     * @var string
     */
    protected $home = 'home';

    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->repository = $gallery;
        $this->middleware('web');
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(GalleryUserRequest $request)
    {
        $this->theme->asset()->add('cube-portfolio.css', 'packages/cube-portfolio/cubeportfolio.min.css');
        $this->theme->asset()->container('footer')->add('cube-portfolio.js', 'packages/cube-portfolio/jquery.cubeportfolio.min.js');

        $galleries = $this->repository
            ->pushCriteria(new \Litecms\Gallery\Repositories\Criteria\GalleryUserCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $gallery = $this->repository->newInstance([]);
        Form::populate($gallery);

        $this->theme->prependTitle(trans('gallery::gallery.names') . ' :: ');

        return $this->theme->of('gallery::user.gallery.index', compact('galleries', 'gallery'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Gallery $gallery
     *
     * @return Response
     */
    public function show(GalleryUserRequest $request, Gallery $gallery)
    {
        Form::populate($gallery);

        return $this->theme->of('gallery::user.gallery.show', compact('gallery'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(GalleryUserRequest $request)
    {

        $gallery = $this->repository->newInstance([]);
        Form::populate($gallery);

        return $this->theme->of('gallery::user.gallery.create', compact('gallery'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(GalleryUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $gallery = $this->repository->create($attributes);

            return redirect(trans_url('/user/gallery/gallery'))
                ->with('message', trans('messages.success.created', ['Module' => trans('gallery::gallery.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Gallery $gallery
     *
     * @return Response
     */
    public function edit(GalleryUserRequest $request, Gallery $gallery)
    {
        $this->theme->asset()->add('cube-portfolio.css', 'packages/cube-portfolio/cubeportfolio.min.css');
        $this->theme->asset()->container('footer')->add('cube-portfolio.js', 'packages/cube-portfolio/jquery.cubeportfolio.min.js');

        Form::populate($gallery);

        return $this->theme->of('gallery::user.gallery.edit', compact('gallery'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Gallery $gallery
     *
     * @return Response
     */
    public function update(GalleryUserRequest $request, Gallery $gallery)
    {
        try {
            $this->repository->update($request->all(), $gallery->getRouteKey());

            return redirect(trans_url('/user/gallery/gallery/' . $gallery->getRouteKey() . '/edit'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('gallery::gallery.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(GalleryUserRequest $request, Gallery $gallery)
    {
        try {
            $t = $gallery->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('gallery::gallery.name')]),
                'code'     => 202,
                'redirect' => trans_url('/user/gallery/gallery'),
            ], 202);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
