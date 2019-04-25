<?php

namespace App\Http\Requests;

use App\Notifications\SendContactEmailNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Notification;

class ContactRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required|string',
			'email' => 'required|email',
			'subject' => 'required|string',
			'body' => 'required|string'
		];
	}

	public function commit() {
		$content = [
			'name' => $this->input('name'),
			'email' => $this->input('email'),
			'body' => $this->input('body'),
			'subject' => $this->input('subject')
		];
		Notification::route('mail', env(CONTACT_DESTINATION_MAIL))->notify(
			new SendContactEmailNotification($content)
		);
	}
}
