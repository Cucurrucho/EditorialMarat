<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Book\CreateBookRequest;
use App\Http\Requests\Admin\Book\DestroyBookRequest;
use App\Http\Requests\Admin\Book\StorePhoto;
use App\Http\Requests\Admin\Book\UpdateBookRequest;
use App\Models\Book;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller {

	public function index() {
		$title = 'Libros';
		$createTitle = 'Agregar Libro';
		return view('admin.datatableWithNew', compact('title', 'createTitle'));
	}

	public function create() {
		return (new Book)->fullData;
	}

	public function store(CreateBookRequest $request) {
		return $request->commit();
	}

	public function edit(Book $book) {
		return $book->fullData;
	}

	public function update(UpdateBookRequest $request, Book $book) {
		return $request->commit();
	}

	public function destroy(DestroyBookRequest $request, Book $book) {
		$request->commit();
		return [
			'success' => true
		];
	}

	public function storePhoto(StorePhoto $request, Book $book) {
		return $request->commit();
	}

	public function destroyPhoto(Book $book, Photo $photo) {
		$photo->delete();
		return [
			'success' => true
		];
	}

	public function getBookPhotos(Book $book) {
		return $book->photos ?? '';
	}
}
