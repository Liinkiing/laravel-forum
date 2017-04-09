@extends('layouts.app', ['title' => $thread->title])

@section('content')

    <main class="container">
        @component('components.thread')
            <h1>{{ $thread->title }}</h1>
            <p>{!! $thread->body !!}</p>
        @endcomponent
    </main>

@endsection