<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Blog\CreateBlogPostRequest;
use App\Http\Requests\Admin\Blog\DeleteBlogPostRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller {


    public function show() {
        $posts = BlogPost::all();
        return view('admin.blog', compact('posts'));
    }

    public function showForm() {
        return view('admin.blogPost.form');
    }

    public function create(CreateBlogPostRequest $request) {
        $request->commit();
        return redirect()->action('Admin\BlogController@show')->with('toast', [
            'type' => 'success',
            'title' => '',
            'message' => 'Articulo creado'
        ]);
    }

    public function delete(DeleteBlogPostRequest $request, BlogPost $blogPost) {
        $request->commit();
        return [
            'success' => true
        ];
    }

    public function showPost(BlogPost $blogPost) {
        return view('admin.blogPost.show', compact('blogPost'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost){
        $request->commit();
        return redirect()->action('Admin\BlogController@show')->with('toast', [
            'type' => 'success',
            'title' => '',
            'message' => 'Articulo actualizado'
        ]);
    }
}
