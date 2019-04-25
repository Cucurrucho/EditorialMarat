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

Route::get('/', 'HomeController@home');
Route::get('/libros/{photo}', 'PhotoController@show');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'HomeController@sendContactEmail');
Route::get('/catalogo', 'BookController@index');
Route::get('datatable/list', 'DatatableController@list');
Route::get('/{book}', 'BookController@show');
foreach (\File::allFiles(__DIR__ . "/web") as $routeFile) {
	include $routeFile;
}
