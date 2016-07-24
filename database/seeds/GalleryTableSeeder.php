<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('galleries')->insert([

            [
                'user_id'       => '1',
                'title'         => 'Adventure',
                'slug'          => 'adventure',
                'image'         => '{"folder":"galleries\\/2016\\/07\\/21\\/121915849\\/image","file":"120.jpg","caption":"120","time":"2016-07-21 12:19:25"}',
                'images'        => '[{"folder":"galleries\\/2016\\/07\\/21\\/121915849\\/images","file":"109.jpg","caption":"109","time":"2016-07-21 12:19:34"},{"folder":"galleries\\/2016\\/07\\/21\\/121915849\\/images","file":"123.jpg","caption":"123","time":"2016-07-21 12:19:35"},{"folder":"galleries\\/2016\\/07\\/21\\/121915849\\/images","file":"131.jpg","caption":"131","time":"2016-07-21 12:19:35"}]',
                'upload_folder' => 'galleries/2016/07/21/121915849',
                'status'        => 'Show',
                'published'     => 'Yes',
                'created_at'    => '2016-07-21 17:49:39',
                'updated_at'    => '2016-07-21 12:19:39',
                'deleted_at'    => null,
            ],

            [
                'user_id'       => '1',
                'title'         => 'Beach',
                'slug'          => 'beach',
                'image'         => '{"folder":"galleries\\/2016\\/07\\/21\\/121851915\\/image","file":"115.jpg","caption":"115","time":"2016-07-21 12:19:55"}',
                'images'        => '[{"caption":"10","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:04","file":"10.jpg"},{"caption":"11","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:04","file":"11.jpg"},{"caption":"13","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:05","file":"13.jpg"},{"caption":"109","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:05","file":"109.jpg"},{"caption":"123","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:05","file":"123.jpg"},{"caption":"131","efolder":"","folder":"galleries\\/2016\\/07\\/21\\/121851915\\/images","time":"2016-07-21 12:19:06","file":"131.jpg"}]',
                'upload_folder' => 'galleries/2016/07/21/121851915',
                'status'        => 'Show',
                'published'     => 'Yes',
                'created_at'    => '2016-07-21 17:49:59',
                'updated_at'    => '2016-07-21 12:19:59',
                'deleted_at'    => null,
            ],
            [
                'user_id'       => '1',
                'title'         => 'Travel',
                'slug'          => 'travel',
                'image'         => '{"folder":"galleries\\/2016\\/07\\/21\\/121821866\\/image","file":"124.jpg","caption":"124","time":"2016-07-21 12:18:30"}',
                'images'        => '[{"folder":"galleries\\/2016\\/07\\/21\\/121821866\\/images","file":"13.jpg","caption":"13","time":"2016-07-21 12:18:42"},{"folder":"galleries\\/2016\\/07\\/21\\/121821866\\/images","file":"109.jpg","caption":"109","time":"2016-07-21 12:18:42"},{"folder":"galleries\\/2016\\/07\\/21\\/121821866\\/images","file":"123.jpg","caption":"123","time":"2016-07-21 12:18:42"}]',
                'upload_folder' => 'galleries/2016/07/21/121821866',
                'status'        => 'Show',
                'published'     => 'Yes',
                'created_at'    => '2016-07-21 17:48:43',
                'updated_at'    => '2016-07-21 12:18:43',
                'deleted_at'    => null,
            ],
            [
                'user_id'       => '1',
                'title'         => 'WildLife',
                'slug'          => 'wildlife',
                'image'         => '{"folder":"galleries\\/2016\\/07\\/21\\/121758920\\/image","file":"19.jpg","caption":"19","time":"2016-07-21 12:18:07"}',
                'images'        => '[{"folder":"galleries\\/2016\\/07\\/21\\/121758920\\/images","file":"10.jpg","caption":"10","time":"2016-07-21 12:18:14"},{"folder":"galleries\\/2016\\/07\\/21\\/121758920\\/images","file":"11.jpg","caption":"11","time":"2016-07-21 12:18:14"}]',
                'upload_folder' => 'galleries/2016/07/21/121758920',
                'status'        => 'Show',
                'published'     => 'Yes',
                'created_at'    => '2016-07-21 17:48:16',
                'updated_at'    => '2016-07-21 12:18:16',
                'deleted_at'    => null,
            ],
            [
                'user_id'       => '1',
                'title'         => 'Works',
                'slug'          => 'parks',
                'image'         => '{"folder":"galleries\\/2016\\/07\\/21\\/121716316\\/image","file":"17.jpg","caption":"17","time":"2016-07-21 12:17:27"}',
                'images'        => '[{"folder":"galleries\\/2016\\/07\\/21\\/121716316\\/images","file":"10.jpg","caption":"10","time":"2016-07-21 12:17:44"},{"folder":"galleries\\/2016\\/07\\/21\\/121716316\\/images","file":"11.jpg","caption":"11","time":"2016-07-21 12:17:44"},{"folder":"galleries\\/2016\\/07\\/21\\/121716316\\/images","file":"13.jpg","caption":"13","time":"2016-07-21 12:17:44"},{"folder":"galleries\\/2016\\/07\\/21\\/121716316\\/images","file":"109.jpg","caption":"109","time":"2016-07-21 12:17:45"}]',
                'upload_folder' => 'galleries/2016/07/21/121716316',
                'status'        => 'Show',
                'published'     => 'Yes',
                'created_at'    => '2016-07-21 17:47:48',
                'updated_at'    => '2016-07-21 12:17:48',
                'deleted_at'    => null,
            ],

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
                'icon'        => 'fa fa-camera',
                'target'      => null,
                'order'       => 170,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/gallery/gallery',
                'name'        => 'Gallery',
                'description' => null,
                'icon'        => 'icon-picture',
                'target'      => null,
                'order'       => 170,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'galleries',
                'name'        => 'Gallery',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 170,
                'status'      => 1,
            ],

        ]);
        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'gallery.gallery.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}
