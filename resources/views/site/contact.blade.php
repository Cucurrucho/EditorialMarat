@extends('layouts.site')
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
                        <dynamic-fields :fields="{{$fields}}">
                        </dynamic-fields>
                        <div class="mt-1 buttons has-content-justified-center">
                            <button class="button is-link">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection