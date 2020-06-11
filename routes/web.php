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


Route::get('/blog','BlogController@index');
Route::get('/','BlogController@index');
Route::get('/about','BlogController@about');
Route::get('/about/edit/','BlogController@aboutedit');
Route::post('/about/edit/{user}','BlogController@aboutupdate')->name('about.edit');
Route::get('/blog/list','BlogController@bloglist');
Route::get('/blog/post/{slug}','BlogController@blogpost');
Route::get('blog/create', 'BlogController@create');
Route::post('blog', 'BlogController@store');
Route::get('blog/post/edit/{slug}', 'BlogController@edit');
Route::post('blog/post/edit/{slug}', 'BlogController@update');
Route::get('blog/post/delete/{slug}', 'BlogController@delete');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
