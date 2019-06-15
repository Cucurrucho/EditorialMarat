<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateContentRequest extends FormRequest {
	protected $content;
	private $fields;

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
		$this->content = app('content');
		$this->fields = array_keys($this->content->all());

		$rules = [];
		foreach ($this->fields as $field) {
			$rules[$field] = 'required|string';
		};
		return $rules;
	}

	public function commit() {
		foreach ($this->fields as $field) {
			$value = $this->input($field);
			$this->content->put($field, $value);
		}
	}
}
