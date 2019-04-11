<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Author\CreateAuthorRequest;
use App\Http\Requests\Admin\Author\DestroyAuthorRequest;
use App\Http\Requests\Admin\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller {

	public function create(CreateAuthorRequest $request){
		return $request->commit();
	}

	public function update(UpdateAuthorRequest $request) {
		return $request->commit();
	}

	public function destroy(DestroyAuthorRequest $request, Author $author) {
		$request->commit();
		return [
			'success' => true
		];
	}
}
