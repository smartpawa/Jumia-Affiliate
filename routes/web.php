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

Route::get('/','ProductsController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('products', 'ProductsController');
Route::get('/all', 'ProductsController@products');
Route::get('/cheapest', 'ProductsController@cheapest');
Route::get('/popular', 'ProductsController@popular');
Route::resource('blog', 'BlogsController');
Route::post('/addvisitcount','ProductsController@addVisitCount');
Route::get('popular','ProductsController@popular');
Route::resource('subcategories', 'SubcategoryController');
Route::get('/filter', 'ProductsController@filterProducts');
Route::get('/search', 'ProductsController@search');

Route::resource('brands', 'BrandController');
Route::get('/addform', 'ProductsController@addForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('new','NewProducts');
