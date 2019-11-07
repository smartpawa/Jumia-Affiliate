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
Route::get('getbrands', 'ProductsController@getBrands');
Route::resource('customs', 'SearchController');

Route::resource('brands', 'BrandController');
<<<<<<< HEAD
=======
Route::get('/addform', 'ProductsController@addForm');
>>>>>>> 755bf4cb98b949284a1c508f738a56fa7eb77fa3

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
=======
Route::resource('new','NewProducts');
>>>>>>> 755bf4cb98b949284a1c508f738a56fa7eb77fa3
