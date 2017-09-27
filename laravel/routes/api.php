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

Route::post('/cms', '\App\Http\Packages\CMS\Controllers\CMSRecordController@store');
Route::get('/cms', '\App\Http\Packages\CMS\Controllers\CMSRecordController@get');
Route::get('/cms/file', '\App\Http\Packages\CMS\Controllers\CMSRecordController@getFile');