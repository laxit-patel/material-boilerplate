<?php

use App\Http\Controllers\CatagoryController;
use Illuminate\Support\Facades\Route;

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
use Illuminate\Support\Facades\Auth;

Route::get('/', 'FrontendController@index')->name('frontend`');
Route::view('/about', 'frontend.about');
Route::view('/quote', 'frontend.quotes');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


	Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

	//catagory routes
	Route::get('/create-catagory', 'CatagoryController@index')->name('create-catagory');
	Route::post('/create-new-catagory', 'CatagoryController@create')->name('create-new-catagory');
	Route::get('/removeCatagory/{id}', 'CatagoryController@destroy')->name('removeCatagory');

	//quote routes
	Route::get('/create-quote', 'QuoteController@index')->name('create-quote');
	Route::post('/create-new-quote', 'QuoteController@create')->name('create-new-quote');
	Route::get('/view-quote', 'QuoteController@show')->name('view-quote');
	//Route::post('/create-quote', 'QuoteController@create')->name('create-quote');

});




