@extends('layouts.app')

@section('content')

    <main class="container">
        <h1>Affichage des sujets</h1>
        @foreach($threads as $thread)
            @component('components.thread')
                <h2><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a></h2>
                <p>{!! $thread->body !!}</p>
            @endcomponent
        @endforeach
    </main>

@endsection