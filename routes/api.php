<?php

use Illuminate\Http\Request;

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

Route::post('/post/berita/viewer/{id}', 'Api\\ApiController@postViewer');
Route::post('/post/event/viewer/{id}', 'Api\\ApiController@postViewerEvent');
Route::get('/get/articles', 'Api\\ApiController@getArticlesLoadmore');
Route::get('/get/videos', 'Api\\ApiController@getVideos');