<?php

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

Route::get('/', function () {
    return redirect(route('auth.login'));
});

Route::name('auth.')->prefix('auth')->namespace('Auth')->group(function () {
    Route::get('register', 'RegisterController@index')->name('register');
    Route::get('login', 'LoginController@index')->name('login');
});

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('', 'HomeController@index')->name('home');

    Route::name('persons')->prefix('persons')->namespace('Persons')->group(function () {
        Route::get('', 'ListController@index');
    });
});
