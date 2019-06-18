@extends('layouts.site')
@section('title', 'Catálogo')
@section('content')
    <catalogue :books="{{$books}}">

    </catalogue>
@endsection