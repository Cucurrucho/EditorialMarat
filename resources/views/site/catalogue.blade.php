@extends('layouts.site')
@section('title', 'Catalogo')
@section('content')
    <catalogue :books="{{$books}}">

    </catalogue>
@endsection