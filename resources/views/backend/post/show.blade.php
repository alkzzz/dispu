@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark me-5">{{ $post->title }}</h2>

    <div class="row mt-3">
        <div class="col" style="text-align: justify;text-justify: inter-word">
            <p class="me-5">{{ $post->content }}</p>
        </div>
    </div>
@endsection
