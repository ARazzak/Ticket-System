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

Route::get('/tickets','TicketsController@index')->name('tickets.index');

Route::get('/tickets/create','TicketsController@create')->name('tickets.create');

Route::post('/tickets/create','TicketsController@store')->name('tickets.store');

Route::get('/tickets/delete/{tickets}','TicketsController@delete')->name('tickets.delete');

Route::post('/tickets/delete/{tickets}','TicketsController@destroy')->name('tickets.destroy');

Route::get('/tickets/{tickets}','TicketsController@show')->name('tickets.show');
Route::post('/tickets/{tickets}','TicketsController@update')->name('tickets.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
