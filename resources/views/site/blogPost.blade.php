@extends('layouts.site')
@section('title', $blogPost->title)
@section('content')
    @component('components.blog', [
        'orderedBlogPosts' => $orderedBlogPosts,
        'currentBlog' => $currentBlog,
        'blogPost' => $blogPost
    ])
    @endcomponent
@endsection