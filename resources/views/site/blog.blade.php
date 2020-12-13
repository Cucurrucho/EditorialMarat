@extends('layouts.site')
@section('title', 'Blog')
@section('content')
    @component('components.blog', [
        'orderedBlogPosts' => $orderedBlogPosts,
        'currentBlog' => $currentBlog,
        'blogPost' => $blogPost
    ])
    @endcomponent
@endsection