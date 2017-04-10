@extends('layouts.app')

@section('content')

    <h1>Affichage des sujets</h1>
    @foreach($threads as $thread)
        @component('components.thread')
            <h2><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a> <small class="reply-count">{{ $thread->replies->count() }}</small></h2>
            <p>{!! $thread->body !!}</p>
        @endcomponent
    @endforeach

@endsection