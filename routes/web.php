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

Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/ecosystem', 'HomeController@ecosystem');
Route::get('/template/{institution}', 'HomeController@template');
Route::get('/contact', 'HomeController@contact');
Route::get('/donation', 'HomeController@donation');


Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'AdminController@index')->middleware('auth');
  Route::resource('/institutions', 'InstitutionController');

  Route::resource('/collabs', 'CollabController');
  Route::resource('/users', 'UserController')->middleware('auth');
  Route::resource('/workshops', 'WorkshopController')->middleware('auth');
  Route::resource('/events', 'EventController')->middleware('auth');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::Resource('/users', 'UserController');
Auth::routes();
