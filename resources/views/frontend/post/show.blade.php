@extends('layouts.frontend.layout')

@section('title', $post->title)

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">BERITA</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/berita') }}" class="text-dark">Berita</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('frontend.getPost', $post->slug) }}"
                        class="text-dark">{{ $post->title }}</a>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 1rem">{{ $post->title }}</h2>
        <p style="color:gray;font-size:0.9rem;font-weight:500;margin-bottom:2rem"><i>
                <i class="fa-solid fa-calendar fa-fw"></i>
                {{ $post->created_at->translatedFormat('j F Y') }}
                ({{ $post->created_at->diffForHumans() }})
            </i>
            <span style="margin-left:5rem"><i class="fa-solid fa-eye"></i> Dilihat {{ $view_count }} kali</span>
        </p>

        <div class="row">
            <div class="col-12 mb-4">
                <img class="img-fluid"
                    src="@if ($post->getFirstMediaUrl('berita', 'large')) {{ $post->getFirstMediaUrl('berita', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                    alt="Gambar {{ $post->title }}">
            </div>
            <div class="col-12" style="text-align: justify">{!! $post->content !!}</div>
        </div>
    </div>
@endsection
