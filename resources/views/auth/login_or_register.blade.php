@extends('layouts.app', ['title' => "Se connecter / S'inscrire"])

@section('content')
    <div class="row">
        <div class="col">
            <div class="panel">
                <div class="panel-heading">
                    <h2>Se connecter</h2>
                </div>
                <div class="panel-body">
                    <div class="row center">
                        {!! Form::open(['url' => route('login'), 'class' => 'login-form']) !!}
                        @if(request()->has('r'))
                            {!! Form::hidden('_redirect', request('r')) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('email', 'Adresse mail') !!}
                            {!! Form::input('text', 'email', old('email')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe') !!}
                            {!! Form::input('password', 'password') !!}
                        </div>
                        <button class="btn btn-primary">Valider</button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="panel">
                <div class="panel-heading">
                    <h2>S'inscrire</h2>
                </div>
                <div class="panel-body">
                    <div class="row center">
                        {!! Form::open(['url' => route('register'), 'class' => 'login-form']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Votre nom') !!}
                            {!! Form::input('name', 'name', old('name')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Adresse mail') !!}
                            {!! Form::input('text', 'email', old('email')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe') !!}
                            {!! Form::input('password', 'password') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Répétez votre mot de passe') !!}
                            {!! Form::input('password', 'password_confirmation') !!}
                        </div>
                        <button class="btn btn-primary">S'inscrire</button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
