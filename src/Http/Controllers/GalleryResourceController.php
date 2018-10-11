<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Gallery\Http\Requests\GalleryRequest;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Models\Gallery;

/**
 * Resource controller class for gallery.
 */
class GalleryResourceController extends BaseController
{

    /**
     * Initialize gallery resource controller.
     *
     * @param type GalleryRepositoryInterface $gallery
     *
     * @return null
     */
    public function __construct(GalleryRepositoryInterface $gallery)
    {
        parent::__construct();
        $this->repository = $gallery;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Gallery\Repositories\Criteria\GalleryResourceCriteria::class);
    }

    /**
     * Display a list of gallery.
     *
     * @return Response
     */
    public function index(GalleryRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Gallery\Repositories\Presenter\GalleryPresenter::class)
                ->$function();
        }

        $galleries = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('gallery::gallery.names'))
            ->view('gallery::gallery.index', true)
            ->data(compact('galleries'))
            ->output();
    }

    /**
     * Display gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return Response
     */
    public function show(GalleryRequest $request, Gallery $gallery)
    {

        if ($gallery->exists) {
            $view = 'gallery::gallery.show';
        } else {
            $view = 'gallery::gallery.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('gallery::gallery.name'))
            ->data(compact('gallery'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new gallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(GalleryRequest $request)
    {

        $gallery = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('gallery::gallery.name')) 
            ->view('gallery::gallery.create', true) 
            ->data(compact('gallery'))
            ->output();
    }

    /**
     * Create new gallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(GalleryRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $gallery                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('gallery::gallery.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('gallery/gallery/' . $gallery->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/gallery/gallery'))
                ->redirect();
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
    public function edit(GalleryRequest $request, Gallery $gallery)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('gallery::gallery.name'))
            ->view('gallery::gallery.edit', true)
            ->data(compact('gallery'))
            ->output();
    }

    /**
     * Update the gallery.
     *
     * @param Request $request
     * @param Model   $gallery
     *
     * @return Response
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        try {
            $attributes = $request->all();

            $gallery->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('gallery::gallery.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('gallery/gallery/' . $gallery->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('gallery/gallery/' . $gallery->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the gallery.
     *
     * @param Model   $gallery
     *
     * @return Response
     */
    public function destroy(GalleryRequest $request, Gallery $gallery)
    {
        try {

            $gallery->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('gallery::gallery.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('gallery/gallery/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('gallery/gallery/' . $gallery->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple gallery.
     *
     * @param Model   $gallery
     *
     * @return Response
     */
    public function delete(GalleryRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('gallery::gallery.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('gallery/gallery'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/gallery/gallery'))
                ->redirect();
        }

    }

    /**
     * Restore deleted galleries.
     *
     * @param Model   $gallery
     *
     * @return Response
     */
    public function restore(GalleryRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('gallery::gallery.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/gallery/gallery'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/gallery/gallery/'))
                ->redirect();
        }

    }

}
