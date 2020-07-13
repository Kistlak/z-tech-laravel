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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MainController@index_page');

Route::get('set_data_to_table', 'HomeController@set_data_to_table')->name('set_data_to_table');

Route::post('save_table_data', 'HomeController@save_table_data')->name('save_table_data');

Route::post('edit_table_data', 'HomeController@edit_table_data')->name('edit_table_data');

Route::post('delete_table_data', 'HomeController@delete_table_data')->name('delete_table_data');
