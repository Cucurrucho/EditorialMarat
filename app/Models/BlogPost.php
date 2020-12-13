<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {


    public function photos() {
        return $this->hasMany(BlogPhoto::class);
    }
}
