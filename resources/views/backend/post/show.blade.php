@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark me-5">{{ $post->title }}</h2>

    <div class="row mt-3">
        <div class="col" style="text-align: justify;text-justify: inter-word">
            <p class="me-5">{!! $post->content !!}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5 class="text-decoration-underline">Kategori</h5>
            <ul style="list-style-type:none;margin:0;padding:0">
                @php $color = ['primary', 'warning', 'danger', 'info', 'success'] @endphp
                @foreach ($post->categories as $category)
                    <li class="fs-6 badge text-bg-{{ $color[$loop->index] }}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h5 class="text-decoration-underline">Tanggal Dibuat</h5>
            <p>{{ $post->created_at->translatedFormat('l, j F Y') }}<br>
                ({{ $post->created_at->diffForHumans() }})</p>
        </div>
    </div>
@endsection
