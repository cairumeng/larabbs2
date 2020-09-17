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

    Route::get('roles', 'RolesController@index')->name('roles.index');
    Route::post('roles', 'RolesController@store')->name('roles.store');
    Route::post('roles/search', 'RolesController@show')->name('roles.show');
    Route::delete('roles', 'RolesController@destroy')->name('roles.destroy');
    Route::patch('roles/{role}', 'RolesController@update')->name('roles.update');
    Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
    Route::post('permissions', 'PermissionsController@store')->name('permissions.store');
    Route::delete('permissions', 'PermissionsController@destroy')->name('permissions.destroy');
    Route::post('permissions/search', 'PermissionsController@show')->name('permissions.show');
    Route::patch('permissions/{permission}', 'PermissionsController@update')->name('permissions.update');
});
