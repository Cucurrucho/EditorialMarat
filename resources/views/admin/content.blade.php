@extends('layouts.dashboard')

@section('title','Contenido')

@section('content')
    <div class="box">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">
                    Textos
                </p>
            </div>
            <div class="card-content">
                <form method="POST" action="{{action('Admin\ContentController@update')}}">
                    @csrf
                    @method('PATCH')
                    @foreach($content as $key => $item)
                        <div class="field">
                            <label class="label">@lang($key)</label>
                            <textarea name="{{$key}}" class="textarea"
                                      required>{{$item}}</textarea>
                            @if($errors->has($key))
                                <p class="help is-danger">{{ $errors->first($key) }}</p>
                            @endif
                        </div>
                    @endforeach
                    <div class="field mt-1">
                        <div class="control">
                            <button class="button is-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection