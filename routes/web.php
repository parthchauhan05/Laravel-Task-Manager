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
Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('/home', 'HomeController@index')->name('home');

Route::delete('/list/{group}', 'GroupController@destroy');
Route::get('/list/{group}', 'TaskController@index')->name('task');
Route::get('/list', 'GroupController@index')->name('list');
Route::post('/list', 'GroupController@store')->name('list');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::put('/task/{task}', 'TaskController@update');
Route::get('/list/edit/{group}', 'GroupController@edit')->name('editGroup');
Route::put('/list/{group}', 'GroupController@update');