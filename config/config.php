<?php

return [

    /**
     * Provider.
     */
    'provider' => 'dentist',

    /*
     * Package.
     */
    'package'  => 'gallery',

    /*
     * Modules.
     */
    'modules'  => ['gallery'],

    'gallery'  => [
        'model'         => 'Litecms\Gallery\Models\Gallery',
        'table'         => 'galleries',
        'presenter'     => \Litecms\Gallery\Repositories\Presenter\GalleryItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'title'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'title', 'image', 'images', 'status'],

        'upload-folder' => '/uploads/gallery/gallery',
        'uploads'       => [
            'single'   => ['image'],
            'multiple' => ['images'],
        ],
        'casts'         => [
            'image'  => 'array',
            'images' => 'array',
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'title' => 'like',
            'status',
        ],
    ],
];
