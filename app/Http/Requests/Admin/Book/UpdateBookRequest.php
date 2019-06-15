<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBookRequest extends FormRequest {
	protected $book;
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$this->book = $this->route('book');
		return [
			'title' => 'required|string|unique:books,title,' . $this->book->id ,
			'pages' => 'required|integer',
			'about' => 'required|string',
			'published' => 'required|date',
			'price' => 'required|numeric',
			'translation' => 'string|nullable',
			'authors' => 'required|array',
			'ISBN' => 'string|unique:books,ISBN,' . $this->book->id,
			'saleLink' => 'string'
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
		$this->book->sale_link = $this->input('saleLink');
		$this->book->authors()->sync($this->input('authors'));
		$this->book->save();
		return $this->book;
	}
}
