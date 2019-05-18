<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){

        return view('admin.index');




    });



    Route::resource('admin/users', 'AdminUsersController',['names'=>[


        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'






    ]]);


    Route::get('/jobs/{id}', ['as'=>'home.jobs', 'uses'=>'AdminJobsController@Job']);

    Route::resource('admin/jobs', 'AdminJobsController',['names'=>[

        'index'=>'admin.jobs.index',
        'create'=>'admin.jobs.create',
        'store'=>'admin.jobs.store',
        'edit'=>'admin.jobs.edit'





    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[


        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'


    ]]);




    Route::resource('admin/media', 'AdminMediasController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'




    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');


    Route::resource('admin/comments', 'JobCommentsController',['names'=>[


        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show'


    ]]);


    Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[



        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit'


    ]]);





});