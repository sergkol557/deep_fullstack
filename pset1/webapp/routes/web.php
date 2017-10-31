<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'is.admin'], function () {


        Route::group(['prefix' => 'admin'], function () {
            // mysite.com/admin/dashboard
            Route::get('/home', 'HomeAdminController@home')->name('admin.home');
            Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

        });
    });
});

