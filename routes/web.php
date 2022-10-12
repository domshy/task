<?php

use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/add-student', 'AdminController@create')->name('create');

Route::post('/add-student', 'AdminController@store')->name('create');
Route::get('/student/{id}/edit', 'AdminController@edit')->name('edit');
Route::post('/student/{id}', 'AdminController@update')->name('update');
Route::post('/student/{id}', 'AdminController@destroy')->name('destroy');
