<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package'  => 'gallery',

    /*
     * Modules.
     */
    'modules'  => ['gallery'],

    'gallery'  => [
        'model'      => [
            'model'         => \Litecms\Gallery\Models\Gallery::class,
            'table'         => 'galleries',
            'presenter'     => \Litecms\Gallery\Repositories\Presenter\GalleryPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => ['slug' => 'title'],
            'dates'         => ['deleted_at', 'createdat', 'updated_at'],
            'appends'       => [],
            'fillable'      => ['id', 'title', 'details', 'images', 'slug', 'status', 'user_id', 'user_type', 'upload_folder', 'deleted_at', 'created_at', 'updated_at'],
            'translatables' => [],
            'upload_folder' => 'gallery/gallery',
            'uploads'       => [
                'images' => [
                    'count' => 25,
                    'type'  => 'image',
                ],
            ],

            'casts'         => [

                'images' => 'array',
                'image'  => 'array',
                'file'   => 'array',

            ],

            'revision'      => [],
            'perPage'       => '20',
            'search'        => [
                'name' => 'like',
                'status',
            ],
        ],

        'controller' => [
            'provider' => 'Litecms',
            'package'  => 'Gallery',
            'module'   => 'Gallery',
        ],

    ],
];
