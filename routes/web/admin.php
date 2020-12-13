<?php
Route::domain('admin.' . env('APP_DOMAIN'))->group(function () {
    Auth::routes(['register' => 'false']);
    Route::namespace('Admin')->middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->action('Admin\BookController@index');
        });
        Route::delete('/{blogPost}', 'BlogController@delete');
        Route::group(['prefix' => 'autores'], function () {
            Route::get('/', 'AuthorController@index');
            Route::post('/', 'AuthorController@create');
            Route::delete('/{author}', 'AuthorController@destroy');
            Route::patch('/{author}', 'AuthorController@update');
        });
        Route::group(['prefix' => 'libros'], function () {
            Route::get('datatable/list', 'DatatableController@list');
            Route::get('/', 'BookController@index');
            Route::get('/edit', 'BookController@create');
            Route::post('/edit', 'BookController@store');
            Route::patch('/edit/{book}', 'BookController@update');
            Route::get('/edit/{book}', 'BookController@edit');
            Route::delete('/delete/{book}', 'BookController@destroy');
            Route::post('/photo/{book}', 'BookController@storePhoto');
            Route::delete('/photo/{book}/{photo}', 'BookController@destroyPhoto');
            Route::get('/photos/{book}', 'BookController@getBookPhotos');
        });
        Route::group(['prefix' => 'contenido'], function () {
            Route::get('/', 'ContentController@show');
            Route::patch('/', 'ContentController@update');
        });
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@show');
            Route::get('/blogPost', 'BlogController@showForm');
            Route::post('/blogPost', 'BlogController@create');
            Route::get('/edit/{blogPost}', 'BlogController@showPost');
            Route::patch('/edit/{blogPost}', 'BlogController@update');

        });
    });
});

