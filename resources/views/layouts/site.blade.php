@extends('layouts.plain')

@section('body')
    <main>
        <nav class="navbar is-spaced has-shadow is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-menu">
                <a class="navbar-item" href="{{action('HomeController@home')}}">
                    Marat
                </a>
                <a class="navbar-item" href="{{action('BookController@index')}}">
                    Catalogo
                </a>
                <a class="navbar-item" href="{{action('HomeController@contact')}}">
                    Contacto
                </a>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </main>
@endsection
