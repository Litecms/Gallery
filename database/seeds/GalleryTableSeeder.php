<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.gallery.gallery.model.table'))->insert([
            ['id' => '1', 'title' => 'Technology', 'image' => '[{"title":"Digital technology laptop 582 378","caption":"Digital technology laptop 582 378","url":"Digital technology laptop 582 378","desc":null,"folder":"2018\\/09\\/21\\/091940300\\/image","time":"2018-09-21 09:19:56","path":"gallery\\/gallery\\/2018\\/09\\/21\\/091940300\\/image\\/digital-technology-laptop-582-378.jpg","file":"digital-technology-laptop-582-378.jpg"}]', 'images' => null, 'slug' => 'technology', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:19:57', 'updated_at' => '2018-09-21 09:19:57'],
            ['id' => '3', 'title' => 'Environment', 'image' => '[{"title":"Life images with quotes 1280x640","caption":"Life images with quotes 1280x640","url":"Life images with quotes 1280x640","desc":null,"folder":"2018\\/09\\/21\\/092108880\\/image","time":"2018-09-21 09:21:26","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092108880\\/image\\/life-images-with-quotes-1280x640.jpg","file":"life-images-with-quotes-1280x640.jpg"}]', 'images' => null, 'slug' => 'environment', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:21:27', 'updated_at' => '2018-09-21 09:21:27'],
            ['id' => '4', 'title' => 'Fruit', 'image' => '[{"title":"Natural image 17","caption":"Natural image 17","url":"Natural image 17","desc":null,"folder":"2018\\/09\\/21\\/092224536\\/image","time":"2018-09-21 09:22:41","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092224536\\/image\\/natural-image-17.jpg","file":"natural-image-17.jpg"}]', 'images' => null, 'slug' => 'fruit', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:22:42', 'updated_at' => '2018-09-21 09:22:42'],
            ['id' => '5', 'title' => 'Galaxy', 'image' => '[{"title":"Lovely galaxy background with flat design 23 2147907799","caption":"Lovely galaxy background with flat design 23 2147907799","url":"Lovely galaxy background with flat design 23 2147907799","desc":null,"folder":"2018\\/09\\/21\\/092410940\\/image","time":"2018-09-21 09:24:38","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092410940\\/image\\/lovely-galaxy-background-with-flat-design-23-2147907799.jpg","file":"lovely-galaxy-background-with-flat-design-23-2147907799.jpg"}]', 'images' => null, 'slug' => 'galaxy', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:24:39', 'updated_at' => '2018-09-21 09:24:39'],
            ['id' => '6', 'title' => 'Car', 'image' => '[{"title":"1493102596 1402","caption":"1493102596 1402","url":"1493102596 1402","desc":null,"folder":"2018\\/09\\/21\\/092545880\\/image","time":"2018-09-21 09:26:07","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092545880\\/image\\/1493102596-1402.jpg","file":"1493102596-1402.jpg"}]', 'images' => null, 'slug' => 'car', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:26:09', 'updated_at' => '2018-09-21 09:26:09'],
            ['id' => '7', 'title' => 'water melon', 'image' => '[{"title":"Watermelon 800x416","caption":"Watermelon 800x416","url":"Watermelon 800x416","desc":null,"folder":"2018\\/09\\/21\\/092650262\\/image","time":"2018-09-21 09:27:05","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092650262\\/image\\/watermelon-800x416.jpg","file":"watermelon-800x416.jpg"}]', 'images' => null, 'slug' => 'water-melon', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:27:06', 'updated_at' => '2018-09-21 09:27:06'],
            ['id' => '8', 'title' => 'Night', 'image' => '[{"title":"Mind wandering at night","caption":"Mind wandering at night","url":"Mind wandering at night","desc":null,"folder":"2018\\/09\\/21\\/092814840\\/image","time":"2018-09-21 09:28:28","path":"gallery\\/gallery\\/2018\\/09\\/21\\/092814840\\/image\\/mind-wandering-at-night.jpg","file":"mind-wandering-at-night.jpg"}]', 'images' => null, 'slug' => 'night', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:28:37', 'updated_at' => '2018-09-21 09:28:37'],
            ['id' => '9', 'title' => 'Girl', 'image' => '[{"title":"Ls","caption":"Ls","url":"Ls","desc":null,"folder":"2018\\/09\\/21\\/093009940\\/image","time":"2018-09-21 09:30:23","path":"gallery\\/gallery\\/2018\\/09\\/21\\/093009940\\/image\\/ls.jpg","file":"ls.jpg"}]', 'images' => null, 'slug' => 'girl', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:30:24', 'updated_at' => '2018-09-21 09:30:24'],
            ['id' => '10', 'title' => 'Child', 'image' => '[{"title":"30605265 1921357261221316 1038947065574457344 n","caption":"30605265 1921357261221316 1038947065574457344 n","url":"30605265 1921357261221316 1038947065574457344 n","desc":null,"folder":"2018\\/09\\/21\\/093932455\\/image","time":"2018-09-21 09:39:58","path":"gallery\\/gallery\\/2018\\/09\\/21\\/093932455\\/image\\/30605265-1921357261221316-1038947065574457344-n.jpg","file":"30605265-1921357261221316-1038947065574457344-n.jpg"}]', 'images' => null, 'slug' => 'child', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:40:00', 'updated_at' => '2018-09-21 09:40:00'],
            ['id' => '11', 'title' => 'Moonar', 'image' => '[{"title":"23","caption":"23","url":"23","desc":null,"folder":"2018\\/09\\/21\\/094059456\\/image","time":"2018-09-21 09:41:13","path":"gallery\\/gallery\\/2018\\/09\\/21\\/094059456\\/image\\/23.png","file":"23.png"}]', 'images' => null, 'slug' => 'moonar', 'published' => 'Yes', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:41:13', 'updated_at' => '2018-09-21 09:41:13'],
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'gallery.gallery.view',
                'name' => 'View Gallery',
            ],
            [
                'slug' => 'gallery.gallery.create',
                'name' => 'Create Gallery',
            ],
            [
                'slug' => 'gallery.gallery.edit',
                'name' => 'Update Gallery',
            ],
            [
                'slug' => 'gallery.gallery.delete',
                'name' => 'Delete Gallery',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/gallery/gallery',
                'name'        => 'Gallery',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'gallery',
                'name'        => 'Gallery',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'pacakge'   => 'Gallery',
        'module'    => 'Gallery',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'gallery.gallery.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}
