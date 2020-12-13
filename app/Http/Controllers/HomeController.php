<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\BlogPhoto;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	public function show(Request $request) {
		$about = app('content')->get('sobre');
		return view('site.home', compact('about'));
	}

	public function contact() {
		$fields = collect([[
			'name' => 'email',
			'label' => 'Correo Electrónico ',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'name',
			'label' => 'Nombre',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'subject',
			'label' => 'Asunto',
			'type' => 'text',
			'value' => '',
		], [
			'name' => 'body',
			'label' => 'Contenido',
			'type' => 'textarea',
			'value' => ''
		]]);
		return view('site.contact', compact('fields'));
	}

	public function sendContactEmail(ContactRequest $request) {
		$request->commit();
		return redirect()->back()->with(['toast' => ['message' => '', 'type' => 'success', 'title' => 'Enviado']]);
	}

    public function blog() {
        setlocale(LC_TIME, 'Spanish');
        $blogPosts = BlogPost::orderByDesc('created_at')->get();
	    $blogPost = $blogPosts->first();
	    $orderedBlogPosts = $blogPosts->groupBy([function ($item) {
            return $item->created_at->format('Y');
        }, function ($item){
	        return $item->created_at->formatLocalized('%B');
        }]);
	    $currentBlog = $blogPost ? $blogPost->id : null;
        return view('site.blog', compact('orderedBlogPosts', 'blogPost', 'currentBlog'));
	}

    public function blogPost(BlogPost $blogPost) {
        setlocale(LC_TIME, 'Spanish');
        $blogPosts = BlogPost::orderByDesc('created_at')->get();
        $orderedBlogPosts = $blogPosts->groupBy([function ($item) {
            return $item->created_at->format('Y');
        }, function ($item){
            return $item->created_at->formatLocalized('%B');
        }]);
        $currentBlog = $blogPost->id;
        return view('site.blogPost', compact('blogPost', 'orderedBlogPosts', 'currentBlog'));
	}
}
