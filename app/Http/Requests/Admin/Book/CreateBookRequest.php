<?php

namespace App\Http\Requests\Admin\Book;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest {
	protected $author;
	public function authorize() {
		return true;
		return $this->user()->can('create', Book::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title' => 'required|string|unique:books',
			'pages' => 'required|integer',
			'about' => 'required|string',
			'published' => 'required|date',
			'price' => 'required|integer',
			'authors' => 'required|array',
			'ISBN' => 'required|string|unique:books'
		];
	}

	public function commit(){
		$book = new Book;
		$book->title = $this->input('title');
		$book->pages = $this->input('pages');
		$book->about = $this->input('about');
		$book->published = $this->input('published');
		$book->price = $this->input('price');
		$book->translation = $this->input('translation');
		$book->ISBN = $this->input('ISBN');
		$book->save();
		$book->authors()->attach($this->input('authors'));
		return $book;
	}
}
