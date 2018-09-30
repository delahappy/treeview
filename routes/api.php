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

Route::post('/tree', 'TreeController@create');
Route::post('/factory', 'FactoryController@create');
Route::put('/factory/{id}', 'FactoryController@update');
Route::delete('/factory/{id}', 'FactoryController@delete');
Route::get('/factory/{id}', 'FactoryController@get');