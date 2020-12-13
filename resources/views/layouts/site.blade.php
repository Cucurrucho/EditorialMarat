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
                <a class="navbar-item  nav-link {{Request::is('marat') ? 'is-active' : '' }}"
                   href="{{action('HomeController@show')}}">
                    Marat
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item nav-link {{Request::is('/') ? 'is-active' : '' }}"
                   href="{{action('BookController@index')}}">
                    Catálogo
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item nav-link {{Request::is('contacto') ? 'is-active' : '' }}"
                   href="{{action('HomeController@contact')}}">
                    Contacto
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item nav-link {{Request::is('blog') ? 'is-active' : '' }}"
                   href="{{action('HomeController@blog')}}">
                    Blog
                </a>
            </div>
            <div class="navbar-end">
                <a class="navbar-item" href="https://www.facebook.com/MaratEditorial/" target="_blank">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a class="navbar-item" href="https://www.instagram.com/editorialmarat/" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a class="navbar-item" href="https://twitter.com/EditorialMarat" target="_blank">
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
    <footer class="footer">
        <div class="content has-text-centered">
            <p class="title">
                Distribución:
            </p>
            <span class="title is-5">Argentina: </span><a href="http://la-periferica.com.ar/distribuidora/"
                                                          target="_blank">Periférica Distrubuidora</a>
            <br>
            <span class="title is-5">España: </span><a href="https://www.traficantes.net/" target="_blank">Traficantes
                de Sueños</a>
            <br>
            <span class="title is-5">Resto Del Mundo: </span><a href="{{action('HomeController@contact')}}"
                                                                target="_blank">Contactanos</a>
            <hr>
            <span class="title is-6">Sitio Creado Por </span><a href="https://elcoop.io/" target="_blank">elcoop.io</a>
        </div>
    </footer>
@endsection
@section('scripts')
    <script type="text/javascript">
        (function () {
            var burger = document.querySelector('.burger');
            var nav = document.querySelector('#' + burger.dataset.target);
            burger.addEventListener('click', function () {
                burger.classList.toggle('is-active');
                nav.classList.toggle('is-active');
            });
        })();
    </script>

@endsection