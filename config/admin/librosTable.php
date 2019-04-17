<?php
return [
	'model' => \App\Models\Book::class,
	'joins' => [
		['author_book', 'books.id', 'author_book.book_id'],
		['authors', 'author_book.author_id', 'authors.id']
	],
	'fields' => [
		[
			'name' => 'id',
			'table' => 'books',
			'title' => 'id',
			'visible' => false
		], [
			'name' => 'title',
			'title' => 'Titulo',
			'sortField' => 'titulo',
		], [
			'name' => 'name',
			'table' => 'authors',
			'title' => 'Autor',
			'sortField' => 'autor',
		]
	]
];