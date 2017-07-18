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

PostRegister::register([
    'name' => 'page',
    'urlBase' => '/',
]);

Route::get('/theme-script/{any}','SiteController@handleScript')->where('any', '.*');
Route::get('/theme-style/{any}','SiteController@handleStyle')->where('any', '.*');


Route::group(['namespace'=>'Admin','prefix'=>'admin'], function () {
    Route::get('/login', function () {
        return view('admin.login');
    });

    Route::post('/login', 'LoginController@authenticate');

    Route::group(['middleware' => 'admin'],function (){

        Route::get('/content-types','AdminController@getContentTypes');

        Route::get('/dashboard', 'AdminController@dashboard');
        Route::post('/products','ProductController@create');
        Route::get('/products','ProductController@getProducts');
        Route::get('/products/{id}','ProductController@createView');
        Route::get('/products/add','ProductController@createView');

        Route::get('/content/{type}','PostController@getPosts');
        Route::get('/content/{type}/{id}','PostController@create');
        Route::get('/contents/{type}/add','PostController@create');
        Route::post('/slug','PostController@slugGen');

        Route::post('/content/{type}/{id}','PostController@update');
        Route::post('/contents/{type}/add','PostController@update');

        Route::get('/theme','ThemeController@viewThemes');
        Route::post('/theme','ThemeController@applyTheme');

        Route::get('/settings','AdminController@viewSettings');
        Route::post('/settings','AdminController@updateSettings');
    });

});

Route::get('/','SiteController@serveHome');
Route::get('/{any}','SiteController@serveSite')->where('any', '.*');



