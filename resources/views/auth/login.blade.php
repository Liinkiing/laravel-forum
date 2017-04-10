@extends('layouts.app', ['title' => "Se connecter"])

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h1>Se connecter</h1>
        </div>
        <div class="panel-body">
            <div class="row center">
                {!! Form::open(['url' => route('login'), 'class' => 'login-form']) !!}
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

@endsection
