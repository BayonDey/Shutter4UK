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
    return view('welcome');
});

Route::get('/', 'Frontend\HomeController@index')->name('frontend_home');;
Route::get('/{dep_link}', 'Frontend\HomeController@index')->name('dept_home');;
Route::get('shop', 'Frontend\HomeController@shop');
// Route::resource('dashboard', 'Admin\DashboardController');

