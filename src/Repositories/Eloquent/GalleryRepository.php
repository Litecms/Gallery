<?php

namespace Litecms\Gallery\Repositories\Eloquent;

use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.gallery.gallery.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.gallery.gallery.model.model');
    }
}
