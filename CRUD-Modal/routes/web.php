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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{id}', 'UserListController@index')->name('profile');
    Route::get('/user_list', 'UserListController@user_list')->name('UserList');
    Route::get('/delete/{id}', 'UserListController@delete')->name('UserDelete');

    Route::post('/create', 'UserListController@create')->name('UserCreate');
    Route::post('/profile_update/{id}', 'UserListController@profile_update')->name('ProfileUpdate');
    
});

Auth::routes();

