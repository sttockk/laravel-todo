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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'App\Http\Controllers\ToDoList', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('list.index');
    Route::post('/', 'StoreController')->name('list.store');
    Route::get('/{list}/edit', 'EditController')->name('list.edit');
    Route::patch('/{list}', 'UpdateController')->name('list.update');

    Route::group(['namespace' => 'Image', 'prefix' => 'image'], function () {
        Route::get('/{list}/add', 'AddController')->name('list.image.add');
        Route::patch('/{list}', 'UpdateController')->name('list.image.update');
        Route::delete('/{list}', 'DeleteController')->name('list.image.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function () {
        Route::get('/{list}/create', 'CreateController')->name('list.tag.create');
        Route::post('/', 'StoreController')->name('list.tag.store');
    });
    Route::prefix('search')->group(function () {
        Route::get('/', 'SearchController@index')->name('list.search');
        Route::get('/tag/{tag}', 'SearchController@main')->name('list.search.tag');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
