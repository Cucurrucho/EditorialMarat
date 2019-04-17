<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::group(['prefix' => 'autores'], function () {
		Route::get('/', 'AuthorController@index');
		Route::post('/', 'AuthorController@create');
		Route::delete('/{author}', 'AuthorController@destroy');
		Route::patch('/{author}', 'AuthorController@update');
	});
	Route::group(['prefix' => 'libros'], function (){
		Route::get('/', 'BookController@index');
		Route::get('/edit', 'BookController@create');
		Route::post('/edit', 'BookController@store');
		Route::patch('/edit/{book}', 'BookController@update');
		Route::get('/edit/{book}', 'BookController@edit');
		Route::delete('/delete/{book}', 'BookController@destroy');
	});
	Route::group(['prefix' => 'contenido'], function (){
		Route::get('/' , 'ContentController@show');
		Route::patch('/' , 'ContentController@update');
	});
});