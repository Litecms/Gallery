<?php

namespace Litecms\Gallery\Repositories\Eloquent;

use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot()
    {
        $this->fieldSearchable = config('package.gallery.gallery.search');
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('package.gallery.gallery.model');
    }
}
