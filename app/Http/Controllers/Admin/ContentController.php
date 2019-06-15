<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Content\UpdateContentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller {

	public function show() {
		$content = app('content')->all();
		return view('admin.content', compact('content'));

	}

	public function update(UpdateContentRequest $request) {
		$request->commit();
		return redirect()->back()->with([
			'success' => true
		]);
	}
}
