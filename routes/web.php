<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[
    'uses'=>'FrontController@getWelcome',
    'as'=>'/'
]);

Route::get('/search-posts/',[
    'uses'=>'FrontController@getSearch',
    'as'=>'search.posts'
]);

Route::get('/filter-by-category/{id}',[
    'uses'=>'FrontController@getFilterByCategory',
    'as'=>'filter.by.category'
]);

Route::get('/front/images/{file_name}',[
    'uses'=>'PostController@getImages',
    'as'=>'front.images'
]);
Route::get('/read/more/{id}',[
    'uses'=>'FrontController@getReadMore',
    'as'=>'read.more'
]);

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){

    Route::put('/post/update',[
        'uses'=>'PostController@updatePost',
        'as'=>'post.update'
    ]);

    Route::get('/post/{id}/edit',[
        'uses'=>'PostController@getEditPost',
        'as'=>'edit.post'
    ]);
    Route::get('/images/{file_name}',[
        'uses'=>'PostController@getImages',
        'as'=>'post.images'
    ]);
    Route::post('/post/new',[
        'uses'=>'PostController@postNewPost',
        'as'=>'post.new'
    ]);
    Route::get('/post/new',[
        'uses'=>'PostController@getNewPost',
        'as'=>'post.new'
    ]);
    Route::get('/posts',[
        'uses'=>'PostController@getPosts',
        'as'=>'posts'
    ]);
    Route::get('/categories',[
        'uses'=>'CategoryController@getCategories',
        'as'=>'categories'
    ]);
    Route::post('/category/new',[
        'uses'=>'CategoryController@postNewCategory',
        'as'=>'new.category'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@getDeleteCategory',
        'as'=>'delete.category'
    ]);
    Route::post('/category/update',[
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update.category'
    ]);
});


