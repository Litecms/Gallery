<?php

// Admin web routes  for gallery
Route::group(['prefix' => trans_setlocale() . '/admin/gallery'], function () {
    Route::post('gallery/status/{Gallery}', 'Litecms\Gallery\Http\Controllers\GalleryAdminController@update');
    Route::resource('gallery', 'Litecms\Gallery\Http\Controllers\GalleryAdminController');
});

// Admin API routes  for gallery
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/gallery'], function () {
    Route::resource('gallery', 'Litecms\Gallery\Http\Controllers\GalleryAdminApiController');
});

// User web routes for gallery
Route::group(['prefix' => trans_setlocale() . '/user/gallery'], function () {
    Route::resource('gallery', 'Litecms\Gallery\Http\Controllers\GalleryUserController');
});

// User API routes for gallery
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/gallery'], function () {
    Route::resource('gallery', 'Litecms\Gallery\Http\Controllers\GalleryUserApiController');
});

// Public web routes for gallery
Route::group(['prefix' => trans_setlocale() . '/galleries'], function () {
    Route::get('/', 'Litecms\Gallery\Http\Controllers\GalleryController@index');
    Route::get('/{slug?}', 'Litecms\Gallery\Http\Controllers\GalleryController@show');
});

// Public API routes for gallery
Route::group(['prefix' => trans_setlocale() . 'api/v1/galleries'], function () {
    Route::get('/', 'Litecms\Gallery\Http\Controllers\GalleryPublicApiController@index');
    Route::get('/{slug?}', 'Litecms\Gallery\Http\Controllers\GalleryPublicApiController@show');
});
