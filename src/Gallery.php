<?php

namespace Litecms\Gallery;

use User;

class Gallery
{
    /**
     * $gallery object.
     */
    protected $gallery;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Gallery\Interfaces\GalleryRepositoryInterface $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Returns count of gallery.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.gallery.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->gallery->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\GalleryUserCriteria());
        }

        $gallery = $this->gallery->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('gallery::' . $view, compact('gallery'))->render();
    }
}
