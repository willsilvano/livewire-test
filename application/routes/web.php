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

Route::layout('layouts.auth')->group(function () {
    Route::livewire('/register', 'auth.register')->name('auth.register');
    Route::livewire('/login', 'auth.login')->name('auth.login');
    Route::livewire('/recover', 'auth.recover')->name('auth.recover');
});

Route::as('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::livewire('/', 'admin.home')->name('home');
    Route::livewire('persons', 'admin.persons')->name('persons');
    Route::livewire('companies', 'admin.companies')->name('companies');
});
