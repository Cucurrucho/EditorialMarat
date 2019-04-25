<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Storage;

class PhotoController extends Controller {

	public function show(Photo $photo) {
		return Storage::response("public/photos/{$photo->file}");
	}
}
