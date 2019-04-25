<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function home() {
		$about = app('content')->get('sobre');
		return view('site.home', compact('about'));
	}

	public function contact() {
		$fields = collect([[
			'name' => 'email',
			'label' => 'Email',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'name',
			'label' => 'Nombre',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'subject',
			'label' => 'Asunto',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'content',
			'label' => 'Contenido',
			'type' => 'textarea',
			'value' => ''
		]]);
		return view('site.contact', compact('fields'));
	}

	public function sendContactEmail(ContactRequest $request) {

	}
}
