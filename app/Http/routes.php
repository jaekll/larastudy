<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/',function(){
//    return view('welcome')->with('msg',date('Y-m-d'));
//});
get('/','BlogController@index');
get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@showPost');

get('contact','ContactController@show');
post('contact','ContactController@sendInfo');

// Admin area
get('admin', function () {
    return redirect('/admin/post');
});

get('rss', 'BlogController@rss');

$router->group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/upload', 'UploadController@index');

    // 添加如下路由
    post('admin/upload/file', 'UploadController@uploadFile');
    delete('admin/upload/file', 'UploadController@deleteFile');
    post('admin/upload/folder', 'UploadController@createFolder');
    delete('admin/upload/folder', 'UploadController@deleteFolder');
});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');