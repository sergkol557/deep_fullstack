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
})->name('welcome');

Auth::routes();


Route::group(['middleware' => ['auth', 'blocked']], function () {


    Route::group(['middleware' => 'is.admin', 'prefix' => 'admin'], function () {


        // mysite.com/admin/dashboard
        Route::get('/home', 'HomeAdminController@home')->name('admin.home');
        Route::post('/home', 'HomeAdminController@changeUserInfo')->name('post.admin');
        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::post('/dashboard', 'AdminController@changeUserForms')->name('post.admin.dashboard');
        Route::delete('dashboard', 'AdminController@delete')->name('delete.admin.dashboard');

    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'HomeController@userform')->name('userform');


});

