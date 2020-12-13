@extends('layouts.dashboard')

@section('title','Blog')

@section('content')
    <div class="card">
        <div class="card-content">
            <h4 class="title is-4">
                Crear Posteo
            </h4>
        </div>
        <div class="card-content">
            <form method="post" action="{{action('Admin\BlogController@create')}}" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label class="label">Titulo</label>
                    <div class="control">
                        <input class="input " type="text" name="title">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Foto</label>
                    <div class="control">
                        <div class="file is-boxed">
                            <label class="file-label">
                                <input class="file-input" type="file" name="photo" accept="image/png, image/jpeg">
                                <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Elegir Foto
                            </span>
                       </span>
                            </label>
                        </div>
                        @if($errors->has('photo'))
                            <p class="help is-danger">{{$errors->first('photos')}}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Articulo</label>
                    <editor name="post" content=" "></editor>
                </div>
                <div class="field mt-1">
                    <div class="control">
                        <button class="button is-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection