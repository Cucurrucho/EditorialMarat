<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	public $appends = [
		'url',
	];

	protected static function boot() {
		parent::boot();
		static::deleted(function ($photo) {
			\Storage::delete("public/photos/{$photo->file}");
		});
	}

	public function book() {
		return $this->belongsTo(Book::class);
	}

	public function getUrlAttribute() {
		return action('PhotoController@show', $this);
	}
}
