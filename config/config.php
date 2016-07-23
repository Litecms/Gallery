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

    /*
     * Image size.
     */
    'image'    => [

       'sm' => [
            'width'     => '160',
            'height'    => '160',
            'action'    => 'resize',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '380',
            'height'    => '570',
            'action'    => 'resize',
            'watermark' => 'img/logo/default.png',
        ],
        'md1' => [
            'width'     => '380',
            'height'    => '380',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],


    ],

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
        'fillable'      => ['user_id', 'title', 'image', 'images', 'status','upload_folder'],

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
