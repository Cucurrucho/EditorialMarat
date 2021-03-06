@extends('layouts.site')
@section('title', $book->title)
@section('content')
    <div class="columns is-centered">
        <div class="column is-three-quarters">
            <div class="box">
                <p class="title">{{$book->title}}</p>
                <p class="subtitle">{{$book->authorsList}}</p>
                <div class="columns">
                    <div class="column is-two-fifths">
                        <carousel :photos="{{$book->photos}}"></carousel>
                    </div>
                    <div class="column is-three-fifths">
                        <span class="title is-5">Precio:</span><span> {{$book->price}}$</span>
                        <br>
                        <span class="title is-5">Fecha De Publicacion:</span><span> {{$book->published}}</span>
                        <br>
                        <span class="title is-5">Paginas:</span><span> {{$book->pages}}</span>
                        <br>
                        <span class="title is-5">Comprar: </span><span> <a href="{{$book->sale_link}}" target="_blank">Mercadolibre</a></span>
                        <br>
                        @isset($book->translation)
                            <span class="title is-5">Traduccion:</span><span> {{$book->translation}}</span>
                            <br>
                        @endisset
                        <span class="title is-5">ISBN:</span><span>{{$book->ISBN}}</span>
                        <br>
                        <br>
                        <p class="title is-4">Sobre El Libro:</p>
                        <div class="content">
                            {{$book->about}}
                        </div>
                        <br>
                        @if($book->authors->count() > 1)
                            <P class="title is-4">Sobre Los Autores</P>
                            @foreach($book->authors as $author)
                                <br>
                                <p class="title is-5">{{$author->name}}</p>
                                <div class="content">
                                    {{$author->about}}
                                </div>
                            @endforeach
                        @else
                            <p class="title is-4">Sobre El Autor:</p>
                            <div class="content">
                                {{$book->authors->first()->about}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection