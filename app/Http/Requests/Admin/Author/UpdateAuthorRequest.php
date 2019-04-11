<?php

namespace App\Http\Requests\Admin\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest {
	protected $author;
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		$this->author = $this->route('author');
		return $this->user()->can('update', $this->author);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required|string|unique',
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
