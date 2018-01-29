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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/objectives/create', 'ObjectiveController@create')->name('objectives.create');

Route::post('/objectives/{employee}/store', 'ObjectiveController@store')->name('objectives.store');

Route::get('/objectives/{employee}/{objective}/show', 'ObjectiveController@show')->name('objectives.show');

Route::get('/objectives/{employee}/{objective}/edit', 'ObjectiveController@edit')->name('objectives.edit');

Route::post('/objectives/{employee}/{objective}/update', 'ObjectiveController@update')->name('objectives.update');

Route::get('/employees/get', 'EmployeeController@get')->name('employees.get');