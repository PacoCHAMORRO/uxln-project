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



/* Route::get('home', 'HomeController@myHome'); */

/* Route::get('admin/institutions', 'InstitutionController@index');
Route::post('admin/institutions', 'InstitutionController@store'); */

/* Route::resource('/admin/institutions', 'InstitutionController'); */

Route::group(['prefix' => 'admin'], function() {
  Route::resource('/institutions', 'InstitutionController')->middleware('auth');
});

Route::get('contact', function() {
    return 'Contact Us';
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::Resource('/institutions', 'InstitutionController');

//Route::group(['prefix' => 'institutions'], function() {
  //  Route::Resource('/{institution}/collabs', 'CollabController');
//});

Route::Resource('/users', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
