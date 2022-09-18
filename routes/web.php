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

Route::get('/', 'MainController@home')->name('home');

Route::get('/category/{category}', 'MainController@category')->name('category');

Route::get('/search', 'MainController@search')->name('search');

Route::get('/single-news/{news}', 'MainController@single_news')->name('single.news');

Auth::routes();

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::prefix('panel')->group(function() {
    Route::delete('/delete-category/{category}', 'DashboardController@delete_category')->name('delete.category');

    Route::post('/add-category', 'DashboardController@add_category')->name('add.category');

    Route::put('/edit-category/{category}', 'DashboardController@edit_category')->name('edit.category');

    Route::get('/news', 'DashboardController@news')->name('dashboard.news');

    Route::delete('/delete-news/{news}', 'DashboardController@delete_news')->name('delete.news');
});
