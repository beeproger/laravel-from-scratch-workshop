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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
    Route::get('todo', 'TodoController@index')->name('todos.index');
    Route::get('todo/create', 'TodoController@create')->name('todos.create');
    Route::post('todo', 'TodoController@store')->name('todos.store');
    Route::post('todo/{todo}/done', 'TodoController@done')->name('todos.done');
    Route::get('todo/{todo}', 'TodoController@edit')->name('todos.edit');
    Route::put('todo/{todo}', 'TodoController@update')->name('todos.update');
    Route::delete('todo/{todo}', 'TodoController@destroy')->name('todos.destroy');

//     OR
//    Route::resource('todo', 'TodoController');

});