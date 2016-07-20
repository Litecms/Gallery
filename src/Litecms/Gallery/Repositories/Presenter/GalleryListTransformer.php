<?php

namespace Litecms\Gallery\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class GalleryListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Gallery\Models\Gallery $gallery)
    {
        return [
            'id'        => $gallery->getRouteKey(),
            'title'     => ucfirst($gallery->title),
            'published' => $gallery->published,
            'image'     => $gallery->image,
            'images'    => $gallery->images,
            'status'    => $gallery->status,
        ];
    }
}
