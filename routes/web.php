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

Auth::routes();

Route::get('/', 'PublicController@index')->name('home');
Route::get('/category/{slug}', 'PublicController@category')->name('category');
Route::get('/article/{slug}', 'PublicController@article')->name('article');

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => ['auth'] ], function() {
    Route::get('/', 'ManagerController@manager')->name('manager.index');
    Route::resource('/category', 'CategoryController', ['as' => 'manager']);
    Route::resource('/article', 'ArticleController', ['as' => 'manager']);
});
