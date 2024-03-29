<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('products', 'ProductController');

Route::get('image-upload/{product}', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload/{product}', 'ImageUploadController@imageUploadPost')->name('image.upload.post');

Route::get('product-list','ProductListController@index')->name('productList.index');