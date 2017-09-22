<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'VehiculoController@showAll');
Route::resource('fabricante', 'FabricanteController');
Route::resource('vehiculo', 'VehiculoController', [
  'only' => ['index', 'show']
]);
Route::resource('fabricante.vehiculo', 'FabricanteVehiculoController', [
  'except' => ['show']
]);
/*
Route::get('/', 'MiControlador@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
