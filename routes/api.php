<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Institution;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. 
|
*/

/* Route::get('/institutions', 'InstitutionController@index');
Route::post('/institutions', 'InstitutionController@store');
Route::get('/institutions/{id}', 'InstitutionController@show');
Route::put('/institutions/{id}', 'InstitutionController@update');
Route::delete('/institutions/{id}', 'InstitutionController@destroy'); */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/institutions', 'InstitutionController');

Route::group(['prefix' => 'institutions'], function() {
    Route::apiResource('/{institution}/collabs', 'CollabController');
});
