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

Route::prefix('')->group(function () {
    Route::get('home-videos','Api\VideoController@list');
    Route::get('home-series','Api\SeriesController@list');
    Route::get('series-detail/{id}','Api\SeriesController@detail');
    Route::get('video-by-category/{id}','Api\VideoController@videoByCat');
    Route::get('series-by-category/{id}','Api\SeriesController@seriesByCat');
    Route::get('starz-videos','Api\VideoController@starz');
    Route::get('starz-series','Api\SeriesController@starz');
});