<?php

namespace App\Http\Requests\Admin\Book;

use App\Models\Photo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Storage;

class StorePhoto extends FormRequest {
	/**
	 * @var \Illuminate\Routing\Route|object|string
	 */

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
			'photo' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf'
		];
	}

	public function commit() {
		$path = $this->processPhoto();
		$photo = new Photo();
		$photo->file = basename($path);
		$this->route('book')->photos()->save($photo);

		return $photo;
	}

	protected function processPhoto() {
		$photo = $this->file('photo');
		$image = ImageManager::gd()->read($photo);
		$width = $image->width();
		$height = $image->height();
		if ($height > 500 || $width > 800) {
			$proportion = $height / $width;
			if ($proportion > 1) {
				$image->resize((int) round(500 / $proportion), 500);
			} else {
				$image->resize(800, (int) round(800 * $proportion));
			}
		}
		$hash = pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.jpeg';
		$path = 'public/photos/' . $hash;
		Storage::put($path, (string) $image->toJpeg());
		return $path;
	}
}
