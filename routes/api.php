<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::post('/login',[
    'uses'=>'ApiController@postLogin'
]);


    Route::get('/categories',[
        'uses'=>'ApiController@getCategories'
    ]);
    Route::post('/category',[
        'uses'=>'ApiController@postNewCategory'
    ]);
    Route::get('/posts',[
        'uses'=>'ApiController@getPosts'
    ]);
    Route::get('/category/{id}/posts',[
        'uses'=>'ApiController@getPostsByCategory'
    ]);
    Route::get('/post/{id}/one',[
        'uses'=>'ApiController@getPostOne'
    ]);