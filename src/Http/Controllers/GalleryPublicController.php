<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;

class GalleryPublicController extends BaseController
{
    // use GalleryWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Gallery\Interfaces\GalleryRepositoryInterface $gallery
     *
     * @return type
     */
    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->repository = $gallery;
        parent::__construct();
    }

    /**
     * Show gallery's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $galleries = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('gallery::gallery.names'))
            ->view('gallery::gallery.index')
            ->data(compact('galleries'))
            ->output();
    }

    /**
     * Show gallery's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $galleries = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('gallery::gallery.names'))
            ->view('gallery::gallery.index')
            ->data(compact('galleries'))
            ->output();
    }

    /**
     * Show gallery.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $gallery = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->setMetaTitle(trans('gallery::gallery.name'))
            ->view('gallery::gallery.show')
            ->data(compact('gallery'))
            ->output();
    }

}
