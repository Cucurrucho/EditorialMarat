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

Route::domain(env('APP_DOMAIN'))->group(function () {
	Route::get('/', 'BookController@index');
	Route::get('/libros/{photo}', 'PhotoController@show');
	Route::get('/contacto', 'HomeController@contact');
	Route::post('/contacto', 'HomeController@sendContactEmail');
	Route::get('/marat', 'HomeController@show');
    Route::get('/blog', 'HomeController@blog');
    Route::get('/{book}', 'BookController@show');
    Route::get('/blog/{blogPost}', 'HomeController@blogPost');
    Route::get('/blog/photo/{blogPhoto}', 'PhotoController@blogPhoto');
});

foreach (\File::allFiles(__DIR__ . "/web") as $routeFile) {
	include $routeFile;
}


