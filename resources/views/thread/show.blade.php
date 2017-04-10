@extends('layouts.app', ['title' => $thread->title])

@section('content')

    <div class="thread-show thread-{{ $thread->id }}">
        <div class="panel">
            <div class="panel-heading">
                <h1>{{ $thread->title }}</h1>
            </div>
            <div class="panel-body">
                <p>{!! $thread->body !!}</p>
            </div>
        </div>
        @if(Auth::check())
        {!! Form::open(['url' => route('replies.store', $thread)]) !!}
            {!! Form::hidden('user_id', auth()->id()) !!}
            <div class="form-group">
                {!! Form::textarea('body', null, ['placeholder' => "Entrez votre réponse ici", 'rows' => 5 ]) !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Répondre</button>
            </div>
        {!! Form::close() !!}
        @else
            <div class="row center" style="margin-top: 20px;">
                <h3>Veuillez vous <a href="{{ route('login') }}?r={{ request()->url() }}">connecter</a> pour poster une réponse</h3>
            </div>
        @endif
        <ul class="replies">
            @foreach($thread->replies as $reply)
                <li class="reply">
                    <h3>{{ $reply->author->name }} a dit <span style="float: right"><small>{{ $reply->created_at->diffForHumans() }}</small></span></h3>
                    <p>{{ $reply->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>


@endsection