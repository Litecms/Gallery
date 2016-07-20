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
        if (User::hasRole('user')) {
            $this->gallery->pushCriteria(new \Litecms\Gallery\Repositories\Criteria\GalleryUserCriteria());
        }
        return $this->gallery
            ->scopeQuery(function ($query) {
                return $query;
            })->count();
    }
}
