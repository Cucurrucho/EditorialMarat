<?php
return [
	'Catalogo' => [
		'Autores' => 'Admin\AuthorController@index',
		'Libros' => 'Admin\BookController@index',
	],
	'General' => [
		'Contentido' => 'Admin\ContentController@show'
	]
];