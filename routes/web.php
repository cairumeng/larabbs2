<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('users', 'UsersController')->only(['show', 'edit', 'update']);
Route::resource('topics', 'TopicsController')->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::post('images', 'ImagesController@store')->name('images.store');
Route::get('/categories/{category}/topics', 'CategoriesController@topics')->name('categories.topics');
Route::resource('replies', 'RepliesController')->only(['store', 'destroy']);

Route::get('notifications', 'NotificationsController@index')->name('notifications.index');

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users', 'UsersController@show')->name('users.show');
    Route::patch('users/{user}', 'UsersController@update')->name('users.update');
    Route::delete('users', 'UsersController@destroy')->name('users.destroy');
});
