<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest {
	protected $book;
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
		$this->book = $this->route('book');
		return $this->user()->can('update', $this->book);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title' => 'required|string|unique:books,title,' . $this->book->id ,
			'pages' => 'required|integer',
			'about' => 'required|about',
			'published' => 'required|date',
			'price' => 'required|integer',
			'translation' => 'string',
			'authors' => 'required|array',
			'ISBN' => 'required|string|unique:books,ISBN,' . $this->book->id
		];
	}

	public function commit() {
		$this->book->title = $this->input('title');
		$this->book->pages = $this->input('pages');
		$this->book->about = $this->input('about');
		$this->book->published = $this->input('published');
		$this->book->price = $this->input('price');
		$this->book->translation = $this->input('translation');
		$this->book->ISBN = $this->input('ISBN');
		$this->book->authors()->attach($this->input('authors'));
		$this->book->save();
		return $this->book;
	}
}
