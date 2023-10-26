@extends('layouts.frontend.layout')

@section('title', $category->title)

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper($category->title) }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url($category->slug) }}"
                        class="text-dark">{{ $category->title }}</a>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <h2 class="pb-2 border-bottom border-2 black">Bidang {{ $category->title }}</h2>
            <p>{!! $bidang->description !!}</p>
            <a href="@if ($bidang->getFirstMediaUrl('bidang', 'large')) {{ $bidang->getFirstMediaUrl('bidang', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                data-title="{{ $bidang->title }}" data-lightbox="bidang">
                <img src="@if ($bidang->getFirstMediaUrl('bidang', 'large')) {{ $bidang->getFirstMediaUrl('bidang', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                    class="object-fit-cover" style="object-fit:cover;object-position: 60% top;" alt="{{ $bidang->title }}" width="100%" height="300px">
            </a>
        </div>
    </div>
    @if (! empty($instagramPosts))
    <div class="mt-0">
        <div class="container-fluid gallery-info">
            <div class="container py-3">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <a href="https://www.instagram.com/{{ $bidang->instagram }}" target="_blank"><img width="40" src="{{ asset('logo/instagram-logo.png') }}" alt=""></a>
                    </div>
                    <div class="flex-grow-1">
                        <a href="https://www.instagram.com/{{ $bidang->instagram }}" class="text-white mb-1 mt-1 fw-bold">{{ "@" . $bidang->instagram }}</a>
                        <h6 class="small text-white fw-light">Instagram Feeds.</h6>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    @foreach ($instagramPosts  as $instagramPost)
                        <div class="col-md-2 col-lg-2 g-2">
                            <div class="card">
                                <img src="data:image/jpeg;base64, {{ $instagramPost->thumbnail }}" class="img-fluid rounded" alt="Gambar">
                                <a target="_blank" href="{{ $instagramPost->url }}">
                                    <div class="card-img-overlay d-flex flex-column align-items-start">
                                        <div class="caption-overlay">
                                            <p class="card-text fw-semibold text-white mt-auto lead"
                                                style="line-height: 1.2rem;font-size:0.8rem">
                                                {!! $instagramPost->caption !!}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 3rem">Berita {{ $category->title }}</h2>
            @foreach ($posts as $post)
                @if ($loop->index % 2)
                    <div class="row">
                        <div class="col-8 mb-3">
                            <h3>{{ $post->title }}</h3>
                            <p class="fs-6" style="text-align: justify">{!! \Str::words($post->content, 90) !!}
                            </p>
                            <a class="btn btn-primary px-4 py-2 rounded-pill small" href="{{ route('frontend.getPost', $post->slug) }}"
                                role="button">Read More <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded object-fit-cover w-100"
                            src="
                             @if ($post->getFirstMediaUrl('berita', 'preview'))
                                {{ $post->getFirstMediaUrl('berita', 'preview') }}
                             @else {{ asset('img/no-image.jpg') }}
                             @endif"
                             alt="image" height="200pt">
                        </div>
                    </div>
                    <hr class="mb-4">
                @else
                    <div class="row">
                        <div class="col-4">
                            <img class="img-fluid rounded object-fit-cover w-100"
                            src="
                             @if ($post->getFirstMediaUrl('berita', 'preview'))
                                {{ $post->getFirstMediaUrl('berita', 'preview') }}
                             @else {{ asset('img/no-image.jpg') }}
                             @endif"
                             alt="image" height="200pt">
                        </div>
                        <div class="col-8 mb-3">
                            <h3>{{ $post->title }}</h3>
                            <p class="fs-6" style="text-align: justify">{!! \Str::words($post->content, 90) !!}
                            </p>
                            <a name="" id="" class="btn btn-primary px-4 py-2 rounded-pill small"
                                href="{{ route('frontend.getPost', $post->slug) }}" role="button">Read More <i
                                    class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                    <hr class="mb-4">
                @endif
            @endforeach
            <div class="row mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('lightbox/js/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            'maxWidth': 1280,
            'fitImagesInViewport': true,
            'wrapAround': true
        })
    </script>
@endsection
