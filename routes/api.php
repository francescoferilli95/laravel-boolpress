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

/**
 *  GET BLOG POSTS
 */
Route::namespace('Api')->group(function() {
    // GET POSTS
    Route::get('/posts', 'PostController@index');


    // GET POST DETAIL
    Route::get('posts/{slug}', 'PostController@show');

    // CONTACT FORM
    Route::post('/contacts', 'ContactController@store');
});
