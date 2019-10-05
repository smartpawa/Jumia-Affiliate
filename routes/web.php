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

Route::get('/', function () {
    return view('affiliate.index');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/products', 'ProductsController@products');
Route::get('/cheapest', 'ProductsController@cheapest');
Route::get('/popular', 'ProductsController@popular');
Route::resource('blog', 'BlogsController');

