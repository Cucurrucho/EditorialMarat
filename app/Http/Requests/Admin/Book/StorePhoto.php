<?php

namespace App\Http\Requests\Admin\Book;

use App\Models\Photo;
use Illuminate\Foundation\Http\FormRequest;
use Storage;
use Image;

class StorePhoto extends FormRequest {
	/**
	 * @var \Illuminate\Routing\Route|object|string
	 */
	private $book;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		$this->book = $this->route('book');
		return true;
		return $this->user()->can('update', $this->book);
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
		$this->book->photos()->save($photo);

		return $photo;
	}

	protected function processPhoto() {
		$photo = $this->file('photo');
		$image = Image::make($photo);
		$width = $image->width();
		$height = $image->height();
		if ($height > 500 || $width > 800) {
			$proportion = $height / $width;
			if ($proportion > 1) {
				$image->resize(round(500 / $proportion), 500);
			} else {
				$image->resize(800, round(800 * $proportion));
			}
		}
		$mime = $image->mime();
		$mime = str_replace('image/', '.', $mime);
		$hash = $photo->hashName();
		if ($mime != '.jpeg' || $mime != '.jpeg') {
			$hash = str_replace($mime, '.jpeg', $photo->hashName());
		}
		$path = 'public/photos/' . $hash;
		Storage::put($path, (string)$image->encode('jpeg'));
		return $path;
	}
}
