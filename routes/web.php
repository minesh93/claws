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

// Route::get('/tasks',function(){
// 	return ['1','1','1','2'];
// });


Route::group(['namespace'=>'Admin','prefix'=>'admin'], function () {
    Route::get('/login', function () {
        return view('admin.login');
    });

    Route::post('/login', 'LoginController@authenticate');

    Route::group(['middleware' => 'admin'],function (){
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::post('/products','ProductController@create');
        Route::get('/products','ProductController@getProducts');
        Route::get('/products/{id}','ProductController@createView');
        Route::get('/products/add','ProductController@createView');

        Route::get('/content/{type}','PostController@getPosts');
        Route::get('/content/{type}/{id}','PostController@create');
        Route::get('/contents/{type}/add','PostController@create');

        Route::post('/content/{type}/{id}','PostController@update');
        Route::post('/contents/{type}/add','PostController@update');

    });

});


