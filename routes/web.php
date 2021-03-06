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

Route::get('/', 'HomeController@index');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('admin')->name('dashboard');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/pages', 'Admin\PagesController', ['except' => ['show']]);
Route::resource('admin/users', 'Admin\UsersController', ['except' => ['show']]);
Route::resource('admin/files', 'Admin\FileController', ['except' => ['show']]);

