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
Route::view('/upload',"upload");
//Route::post('/store',"UserController@store");
   Route::resource('users', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){
   
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::post('files/upload','FileController@upload');
    Route::get('/files/download/{file}', 'FileController@show')->name('downloadfile');
    Route::get('/files/delete/{file}', 'FileController@destroy')->name('deletefile');

    Route::resource('folders', 'FolderController');
    Route::resource('files', 'FileController');
 
});