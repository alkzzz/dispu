@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark me-5">{{ $page->title }}</h2>

    <div class="row mt-3">
        <div class="col" style="text-align: justify;text-justify: inter-word">
            <p class="me-5">{!! $page->content !!}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5 class="text-decoration-underline">Tanggal Dibuat</h5>
            <p>{{ $page->created_at->translatedFormat('l, j F Y') }}<br>
                ({{ $page->created_at->diffForHumans() }})</p>
        </div>
        <div class="col">
            <h5 class="text-decoration-underline">Terakhir Diupdate</h5>
            <p>{{ $page->updated_at->translatedFormat('l, j F Y') }}<br>
                ({{ $page->updated_at->diffForHumans() }})</p>
        </div>
    </div>
@endsection
