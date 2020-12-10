<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Institution;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. 
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/institutions', 'InstitutionController');

Route::group(['prefix' => 'institutions'], function() {
    Route::apiResource('/{institution}/collabs', 'CollabController');
});

Route::apiResource('/users', 'UserController');