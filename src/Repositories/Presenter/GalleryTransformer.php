<?php

namespace Litecms\Gallery\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class GalleryTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Gallery\Models\Gallery $gallery)
    {
        return [
            'id'            => $gallery->getRouteKey(),
            'title'         => $gallery->title,
            'details'       => $gallery->details,
            'images'        => $gallery->images,
            'slug'          => $gallery->slug,
            'status'        => $gallery->status,
            'user_id'       => $gallery->user_id,
            'user_type'     => $gallery->user_type,
            'upload_folder' => $gallery->upload_folder,
            'deleted_at'    => $gallery->deleted_at,
            'created_at'    => $gallery->created_at,
            'updated_at'    => $gallery->updated_at,
            'url'           => [
                'public' => trans_url('gallery/' . $gallery->getPublicKey()),
                'user'   => guard_url('gallery/gallery/' . $gallery->getRouteKey()),
            ],
            'created_at'    => format_date($gallery->created_at),
            'updated_at'    => format_date($gallery->updated_at),
        ];
    }
}
