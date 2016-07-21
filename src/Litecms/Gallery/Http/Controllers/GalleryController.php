<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\PublicWebController as PublicController;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;

class GalleryController extends PublicController
{
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
        $this->theme->asset()->add('cube-portfolio.css', 'packages/cube-portfolio/cubeportfolio.min.css');
        $this->theme->asset()->container('footer')->add('cube-portfolio.js', 'packages/cube-portfolio/jquery.cubeportfolio.min.js');

        $galleries = $this->repository
            ->pushCriteria(new \Litecms\Gallery\Repositories\Criteria\GalleryPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        return $this->theme->of('gallery::public.gallery.index', compact('galleries'))->render();
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
        $this->theme->asset()->add('cube-portfolio.css', 'packages/cube-portfolio/cubeportfolio.min.css');
        $this->theme->asset()->container('footer')->add('cube-portfolio.js', 'packages/cube-portfolio/jquery.cubeportfolio.min.js');

        $gallery = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')
                ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('gallery::public.gallery.show', compact('gallery'))->render();
    }
}
