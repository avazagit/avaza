<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::resource('staffs', 'StaffsController');
Route::resource('employees', 'EmployeesController');
Route::resource('interpreters', 'InterpretersController');
Route::resource('clients', 'ClientsController');
Route::resource('languages', 'LanguagesController');
Route::resource('users', 'UsersController');
Route::resource('permissions', 'PermissionsController');
Route::resource('schedules', 'SchedulesController');
Route::resource('events', 'EventsController');
Route::resource('contracts', 'ContractsController');
Route::resource('agencies', 'AgenciesController');
Route::resource('divisions', 'DivisionsController');