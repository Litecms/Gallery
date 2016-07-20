<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\UserApiController as UserController;
use Litecms\Gallery\Http\Requests\GalleryUserApiRequest;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Models\Gallery;

/**
 * User API controller class.
 */
class GalleryUserApiController extends UserController
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
    public function index(GalleryUserApiRequest $request)
    {
        $galleries = $this->repository
            ->pushCriteria(new \Litecms\Gallery\Repositories\Criteria\GalleryUserCriteria())
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
    public function show(GalleryUserApiRequest $request, Gallery $gallery)
    {

        if ($gallery->exists) {
            $gallery         = $gallery->presenter();
            $gallery['code'] = 2001;
            return response()->json($gallery)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new gallery.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(GalleryUserApiRequest $request, Gallery $gallery)
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
    public function store(GalleryUserApiRequest $request)
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
    public function edit(GalleryUserApiRequest $request, Gallery $gallery)
    {

        if ($gallery->exists) {
            $gallery         = $gallery->presenter();
            $gallery['code'] = 2003;
            return response()->json($gallery)
                ->setStatusCode(200, 'EDIT_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Update the gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return json
     */
    public function update(GalleryUserApiRequest $request, Gallery $gallery)
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
    public function destroy(GalleryUserApiRequest $request, Gallery $gallery)
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
