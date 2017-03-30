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

Route::get('/users', function (Request $request) {
	return \App\User::all();
});

Route::post('/login', 'Api\LoginController@login');
Route::post('/login/refresh', 'Api\LoginController@refresh');


Route::group([ 'middleware' => 'auth:api'], function () {
        Route::get('/user', function (Request $request) {
        	return $request->user();
        });
        Route::post('/logout', 'Api\LoginController@logout');
});
