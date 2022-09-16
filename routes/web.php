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
