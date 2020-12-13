<?php

namespace App\Http\Requests\Admin\Blog;

use App\Models\BlogPhoto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Image;
use Storage;

class UpdateBlogPostRequest extends FormRequest {
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
            'title' => 'required|string',
            'post' => 'required|string',
            'photo' => 'mimes:jpeg,bmp,png,gif,svg,pdf'
        ];
    }

    public function commit() {
        $blogPost = $this->route('blogPost');
        $blogPost->title = $this->input('title');
        $blogPost->text = $this->input('post');
        if ($this->has('photo')){
            $oldPhoto = $blogPost->photos->first();
            if ($oldPhoto){
                $oldPhoto->delete();
            }
            $path = $this->processPhoto();
            $photo = new BlogPhoto();
            $photo->file = basename($path);
            $blogPost->photos()->save($photo);
        }
        $blogPost->save();

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
