@extends('layouts.app', ['title' => $thread->title])

@section('content')

    <main class="container">
        @component('components.thread')
            <h1>{{ $thread->title }}</h1>
            <p>{!! $thread->body !!}</p>
            <hr>
            @foreach($thread->replies as $reply)
                @component('components.reply')
                    <h3>{{ $reply->author->name }} a dit...</h3>
                    <p>{{ $reply->body }}</p>
                @endcomponent
            @endforeach
        @endcomponent
    </main>

@endsection