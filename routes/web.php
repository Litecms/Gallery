<?php

// Resource routes  for gallery
Route::group(['prefix' => set_route_guard('web').'/gallery'], function () {
    Route::resource('gallery', 'GalleryResourceController');
});

// Public  routes for gallery
Route::get('gallery/popular/{period?}', 'GalleryPublicController@popular');
Route::get('galleries/', 'GalleryPublicController@index');
Route::get('galleries/{slug?}', 'GalleryPublicController@show');

