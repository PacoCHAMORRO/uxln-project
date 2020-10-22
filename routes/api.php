<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Institution;

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

// Collabs
// CRUD

// 1. get all (GET) /api/collabs
// 2. create a collab (POST) /api/collab
// 3. get a single (GET) /api/collabs/{id}
// 4. update a single (PUT/PATCH) /api/collabs/{id}
// 5. delete (DELETE) /aoi/collabs/{id}

// to create a resource (collabs) in laravel
// 1. create the db and migrations
// 2. create a model
// 2.5 create service Eloquen ORM
// 3. create a controller to go get info from the db
// 4. return that info

Route::get('/institutions', 'InstitutionController@index');
Route::post('/institutions', 'InstitutionController@store');
Route::get('/institutions/{id}', 'InstitutionController@show');
Route::put('/institutions/{id}', 'InstitutionController@update');
Route::delete('/institutions/{id}', 'InstitutionController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
