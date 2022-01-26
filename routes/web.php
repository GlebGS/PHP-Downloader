<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\HomeContreoller@fake')->name('fake');

Route::prefix('user')->group(function (){
    Route::middleware('auth')->group(function (){
        Route::get('/id={id}', 'App\Http\Controllers\HomeContreoller@index')->name('main');
        Route::get('/profile/id={id}', 'App\Http\Controllers\HomeContreoller@profile');
        Route::get('/logout/id={id}', 'App\Http\Controllers\HomeContreoller@logout');
        Route::get('/download/id={id}', 'App\Http\Controllers\HomeContreoller@download');
        Route::get('/addNote/id={id}', 'App\Http\Controllers\HomeContreoller@addNote');
        Route::get('/edit/id={id}', 'App\Http\Controllers\HomeContreoller@editUser');
        Route::get('/users/id={id}', 'App\Http\Controllers\HomeContreoller@users');
    });
});

//GET
Route::get('/login', 'App\Http\Controllers\HomeContreoller@login')->name('login');
Route::get('/registration', 'App\Http\Controllers\HomeContreoller@registration')->name('register');
Route::get('/delete/id={id}', 'App\Http\Controllers\UserController@delete');
Route::get('/deleteFile/id={id}', 'App\Http\Controllers\UserController@deleteFile');
Route::get('/file/download/id={id}', 'App\Http\Controllers\ImageController@downloadFile');

//POST
Route::post('/add', 'App\Http\Controllers\UserController@addUser');
Route::post('/log', 'App\Http\Controllers\UserController@logUser');
Route::post('/downloadUrl', 'App\Http\Controllers\ImageController@downloadUrl')->name('downloadUrl');
Route::post('/editUser/id={id}', 'App\Http\Controllers\UserController@edit');
Route::post('/image/upload', 'App\Http\Controllers\ImageController@upload')->name('image.upload');
