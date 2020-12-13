@extends('layouts.dashboard')

@section('title','Blog')

@section('content')
    <div class="card">
        <div class="card-content">
            <h4 class="title is-4">
                Blog
            </h4>
        </div>
        <div class="card-content">
            <dynamic-table :responsive="true" edit-button="test" :init-fields="{{ $posts }}" :columns="[{
                name: 'title',
                label: 'Titulo',
                type: 'text'
            }, {
                name: 'created_at',
                label: 'Fecha de publicacion',
                type: 'date'
            }]"
            >
            </dynamic-table>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
                <a class="button is-primary" href="{{action('Admin\BlogController@showForm')}}">Agregar Blog</a>
            </div>
        </div>
    </div>
@endsection