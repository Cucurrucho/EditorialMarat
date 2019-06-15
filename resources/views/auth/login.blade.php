@extends('layouts.plain')

@section('body')
    <div class="section site-section">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">Iniciar Sesión</div>
                </div>
                <div class="card-content">
                    <form method="post" action="{{ action('Auth\LoginController@login') }}">
                        @csrf
                        <text-field
                                :field="{label: 'Correo Electronico', name: 'email', subType: 'email'}"
                                :error="{{ $errors->count() ? collect([__('auth.failed')]): 'null'}}"></text-field>
                        <text-field
                                :field="{label: 'Contraseña', name: 'password', subType: 'password'}"></text-field>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="remember">
                                Recuedeme
                            </label>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="button is-primary">
                                Iniciar Sesión
                            </button>
                            <a href="{{ action('Auth\ForgotPasswordController@showLinkRequestForm') }}"
                               class="button is-dark">Olvide mi contraseña</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
