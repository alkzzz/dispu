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
        <div class="row mb-5">
            <h2 class="pb-2 border-bottom border-2 black">Profil {{ $category->title }}</h2>
            <p>{{ $bidang->description }}</p>
            <a href="@if ($bidang->getFirstMediaUrl('bidang', 'large')) {{ $bidang->getFirstMediaUrl('bidang', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                data-title="{{ $bidang->title }}" data-lightbox="bidang">
                <img src="@if ($bidang->getFirstMediaUrl('bidang', 'large')) {{ $bidang->getFirstMediaUrl('bidang', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                    class="img-fluid" alt="{{ $bidang->title }}">
            </a>
        </div>
        <div class="row">
            <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 3rem">Berita {{ $category->title }}</h2>
            @foreach ($posts as $post)
                @if ($loop->index % 2)
                    <div class="row">
                        <div class="col-8">
                            <h3>{{ $post->title }}</h3>
                            <p class="fs-5" style="text-align: justify">{!! \Str::words($post->content, 90) !!}
                            </p>
                            <a class="btn btn-primary" href="{{ route('frontend.getPost', $post->slug) }}"
                                role="button">Read
                                More <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                        <div class="col-4">
                            <div class="card shadow p-1 mb-3 bg-white rounded">
                                <img class="img-fluid" src="https://picsum.photos/500?random=1" alt=""
                                    srcset="">
                                <div class="card-img-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                @else
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow p-1 mb-3 bg-white rounded">
                                <img class="img-fluid" src="https://picsum.photos/500?random=2" alt=""
                                    srcset="">
                                <div class="card-img-overlay"></div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h3>{{ $post->title }}</h3>
                            <p class="fs-5" style="text-align: justify">{!! \Str::words($post->content, 90) !!}
                            </p>
                            <a name="" id="" class="btn btn-primary"
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
