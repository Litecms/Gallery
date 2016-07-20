<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('galleries')->insert([

            [
                'id'         => '1',
                'user_id'    => '1',
                'title'      => 'Adventure',
                'slug'       => 'adventure',
                'image'      => '{"folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/114942336\\/image\\/","file":"14.jpg","caption":"14","time":"2016-07-20 11:50:56","efolder":"galleries\\/j008I9h2cDJjEN\\/image"}',
                'images'     => '',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:10',
                'updated_at' => '2016-07-20 11:50:57',
                'deleted_at' => null,
            ],
            [
                'id'         => '2',
                'user_id'    => '1',
                'title'      => 'Family',
                'slug'       => 'family',
                'image'      => '{"folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115058613\\/image\\/","file":"17.jpg","caption":"17","time":"2016-07-20 11:52:12","efolder":"galleries\\/gddaFVhLcLLlNR\\/image"}',
                'images'     => '',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:15',
                'updated_at' => '2016-07-20 11:52:14',
                'deleted_at' => null,
            ],
            [
                'id'         => '3',
                'user_id'    => '1',
                'title'      => 'Beach',
                'slug'       => 'beach',
                'image'      => '{"folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115233837\\/image\\/","file":"19.jpg","caption":"19","time":"2016-07-20 11:53:40","efolder":"galleries\\/488OIYhYcDOJNE\\/image"}',
                'images'     => '',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:16',
                'updated_at' => '2016-07-20 11:53:41',
                'deleted_at' => null,
            ],
            [
                'id'         => '4',
                'user_id'    => '1',
                'title'      => 'Travel',
                'slug'       => 'travel',
                'image'      => '{"folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115341668\\/image\\/","file":"42.jpg","caption":"42","time":"2016-07-20 11:54:20","efolder":"galleries\\/5nn1uZh0c14Nyk\\/image"}',
                'images'     => '',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:17',
                'updated_at' => '2016-07-20 11:54:25',
                'deleted_at' => null,
            ],
            [
                'id'         => '5',
                'user_id'    => '1',
                'title'      => 'WildLife',
                'slug'       => 'wildlife',
                'image'      => '{"folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115425927\\/image\\/","file":"105.jpg","caption":"105","time":"2016-07-20 11:54:56","efolder":"galleries\\/0EELiPhyclqOp9\\/image"}',
                'images'     => '',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:18',
                'updated_at' => '2016-07-20 11:54:58',
                'deleted_at' => null,
            ],
            [
                'id'         => '6',
                'user_id'    => '1',
                'title'      => 'Parks',
                'slug'       => 'parks',
                'image'      => '{"caption":"111","efolder":"galleries\\/l11vhBh5cebom6\\/image","file":"111.jpg"}',
                'images'     => '[{"caption":"Easy Note","efolder":"galleries\\/pZZPuAhAcmEYne\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115550685\\/images\\/","time":"2016-07-20 11:59:43","file":"131.jpg"},{"caption":"The gang Blue","efolder":"galleries\\/5nn1uZh0c16bjO\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/115952149\\/images\\/","time":"2016-07-20 12:00:15","file":"120.jpg"},{"caption":"Tiger","efolder":"galleries\\/1oogSmhncE4avX\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120048967\\/images\\/","time":"2016-07-20 12:02:27","file":"111.jpg"},{"caption":"Flat Roman Typeface","efolder":"galleries\\/1oogSmhncE4avX\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120048967\\/images\\/","time":"2016-07-20 12:02:38","file":"11.jpg"},{"caption":"Seemple Music for iPad","efolder":"galleries\\/1oogSmhncE4avX\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120048967\\/images\\/","time":"2016-07-20 12:02:45","file":"13.jpg"},{"caption":"Remind Me More","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:06:48","file":"125.jpg"},{"caption":"Volume Knob","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:06:58","file":"105.jpg"},{"caption":"Workout Buddy","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:06:59","file":"115.jpg"},{"caption":"Ski  Buddy","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:07:10","file":"10.jpg"},{"caption":"Virtualization Icon","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:07:26","file":"14.jpg"},{"caption":"World Clock Widget","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:07:26","file":"17.jpg"},{"caption":"Sickpuppy","efolder":"galleries\\/b33rfdhec16zGK\\/images","folder":"\\/uploads\\/galleries\\/2016\\/07\\/20\\/120628417\\/images\\/","time":"2016-07-20 12:07:27","file":"19.jpg"}]',
                'status'     => 'Show',
                'published'  => 'Yes',
                'created_at' => '2016-07-20 17:49:30',
                'updated_at' => '2016-07-20 12:13:18',
                'deleted_at' => null,
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
                'order'       => 1,
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
                'order'       => 1,
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
                'order'       => 1,
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
