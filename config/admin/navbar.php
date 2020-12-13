<?php
return [
	'Catálogo' => [
		'Autores' => 'Admin\AuthorController@index',
		'Libros' => 'Admin\BookController@index',
	],
	'General' => [
		'Contentido' => 'Admin\ContentController@show',
        'Blog' => 'Admin\BlogController@show'
	]
];