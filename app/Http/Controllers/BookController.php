<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

	public function index() {
		$books = Book::with('photos')->orderBy('published')->get();
		return view('site.catalogue', compact('books'));
	}

	public function show(Book $book) {
		return view('site.book', compact('book'));
	}
}
