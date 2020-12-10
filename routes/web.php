<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Institution;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'HomeController@index')->middleware('auth');
  Route::resource('/institutions', 'InstitutionController')->middleware('auth');
  Route::resource('/collabs', 'CollabController')->middleware('auth');
});



Route::get('contact', function() {
    return 'Contact Us';
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::Resource('/users', 'UserController');
Auth::routes();
