<?php

namespace App\Http\Requests\Admin\Author;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAuthorRequest extends FormRequest {
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
		return [
			'name' => 'required|string|unique:authors',
			'about' => 'required|string'
		];
	}

	public function commit() {
		$author = new Author;
		$author->name = $this->input('name');
		$author->about = $this->input('about');
		$author->save();
		return $author;
	}
}
