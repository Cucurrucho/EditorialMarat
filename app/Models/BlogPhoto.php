<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPhoto extends Model {

    public $appends = [
        'url',
    ];

    protected static function boot() {
        parent::boot();
        static::deleted(function ($photo) {
            \Storage::delete("public/photos/{$photo->file}");
        });
    }

    public function blogPost() {
        return $this->blengsTo(BlogPost::class);
    }

    public function getUrlAttribute() {
        return action('PhotoController@blogPhoto', $this);
    }
}
