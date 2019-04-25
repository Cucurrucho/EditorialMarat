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
                    <div class="card-image" >
                        <img src="/images/tapa.jpg" height="80" width="400">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection