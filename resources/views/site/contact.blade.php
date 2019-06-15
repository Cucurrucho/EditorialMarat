@extends('layouts.site')
@section('title', 'Contacto')
@section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        Contactanos
                    </div>
                </div>
                <div class="card-content">
                    <form method="post" action="{{action('HomeController@sendContactEmail')}}">
                        @csrf
                        <dynamic-fields :fields="{{$fields}}">
                        </dynamic-fields>
                        <div class="mt-1 buttons has-content-justified-center">
                            <button class="button is-link" type="submit">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection