<?php

namespace App\Http\Requests\Admin\Author;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAuthorRequest extends FormRequest {
	protected $author;
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		$this->author = $this->route('author');
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required|string|unique:authors,name,' . $this->author->id,
			'about' => 'required|string'
		];
	}

	public function commit() {
		$this->author->name = $this->input('name');
		$this->author->about = $this->input('about');
		$this->author->save();
		return $this->author;
	}
}
