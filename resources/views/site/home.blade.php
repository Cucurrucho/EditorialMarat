@extends('layouts.site')
@section('title', 'Marat')
@section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card about-card">
                <div class="card-content has-text-centered">
                    <p class="title">
                        Editorial Marat
                    </p>

                    <div class="content about-text">
                        {{$about}}
                    </div>
                    <div class="card-image">
                        <img src="/images/tapa.jpg" height="80" width="400">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    <footer class="footer">
        <div class="content has-text-centered">
            <p class="title">
                Distribucion
            </p>
            <span class="title is-5">Argentina: </span><a href="https://www.waldhuter.com.ar/">Waldhuter</a>
            <br>
            <span class="title is-5">España: </span><a href="https://www.traficantes.net/">Traficantes de Sueños</a>
            <br>
            <span class="title is-5">Resto Del Mundo: </span><a href="{{action('HomeController@contact')}}">Contactanos</a>
        </div>
    </footer>
@endsection