<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImportExportController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', 'PagesController@index');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {


    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/add-student', 'AdminController@create')->name('create');

    // Add student
    Route::post('/add-student', 'AdminController@store')->name('create');
    Route::get('/student/edit/{id}', 'AdminController@edit')->name('edit');
    Route::post('/student/update/{id}', 'AdminController@update')->name('update');
    Route::post('/student/destry/{id}', 'AdminController@destroy')->name('destroy');

    //Import Exports 
    Route::get('/students/view-pdf', 'ImportExportController@viewPDF')->name('view-pdf');
    Route::get('/students/download-pdf', 'ImportExportController@downloadPDF')->name('download-pdf');
    Route::get('/students/download-excel', 'ImportExportController@exportToExcel')->name('download-excel');
    Route::get('/students/download-csv', 'ImportExportController@exportIntoCSV')->name('download-csv');
    Route::get('/students/import', 'ImportExportController@importView')->name('import');
    Route::post('/students/import', 'ImportExportController@importFile')->name('import-excel');

    //announcement
    
});

Route::prefix('student')->middleware('auth')->group(function() {
    
});