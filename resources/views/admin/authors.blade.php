@extends('layouts.dashboard')

@section('title','Autores')

@section('content')
    <div class="card">
        <div class="card-content">
            <h4 class="title is-4">
                Autores
            </h4>
        </div>
        <div class="card-content">
            <dynamic-table :responsive="true" :init-fields="{{ $authors }}" :columns="[{
                name: 'name',
                label: 'Nombre',
                type: 'text'
            }, {
                name: 'about',
                label: 'Sobre',
                type: 'textarea'
            }]"
                 action="{{ action('Admin\AuthorController@create') }}">
            </dynamic-table>
        </div>
    </div>
@endsection