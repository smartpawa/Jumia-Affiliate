<?php
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
Route::get('/advancedsearch', 'ProductsController@advancedsearch');
Route::get('/getsubcats', 'ProductsController@getSubCats');
Route::get('/getbrands', 'ProductsController@getBrands');

Route::resource('customsearch', 'SearchController');

Route::resource('brands', 'BrandController');
Route::get('/addform', 'ProductsController@addForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('new','NewController');
