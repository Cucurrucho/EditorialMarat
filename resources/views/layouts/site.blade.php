@extends('layouts.plain')

@section('body')
    <nav class="navbar is-spaced has-shadow is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <div class="navbar-item">
                <img src="/images/logo.jpg" height="50" width="130">
            </div>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="mainNav">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="mainNav" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item navbar-text nav-link" href="{{action('HomeController@home')}}">
                    Marat
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item navbar-text nav-link" href="{{action('BookController@index')}}">
                    Catalogo
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item navbar-text nav-link" href="{{action('HomeController@contact')}}">
                    Contacto
                </a>
            </div>
            <div class="navbar-end">
                <a class="navbar-item" href="https://www.facebook.com/MaratEditorial/">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a class="navbar-item" href="https://www.instagram.com/editorialmarat/">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a class="navbar-item" href="https://twitter.com/EditorialMarat">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
            </div>
        </div>
    </nav>
    <main>
        <div class="section site-section">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </main>
@endsection
