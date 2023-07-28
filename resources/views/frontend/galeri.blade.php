@extends('layouts.frontend.layout')

@section('title', 'Galeri Kegiatan')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
    <style>
        .caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.6);
            /* Adjust the opacity (0.6) as needed */
            color: #fff;
            /* Set the text color to white or any other suitable color */
            padding: 10px;
        }
    </style>
@endsection

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper('Galeri') }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href={{ route('frontend.galeri.index') }}"
                        class="text-dark">Galeri</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 2rem">Galeri Kegiatan Dinas Pekerjaan Umum dan
            Penataan Ruang
            Kota Banjarbaru</h2>
        @foreach ($galleries->chunk(3) as $galleryChunk)
            <div class="row d-flex justify-content-center align-items-center">
                @foreach ($galleryChunk as $gallery)
                    <div class="col-12 col-md-4 g-3">
                        <div class="card border-dark">
                            <img src="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                class="img-fluid rounded" alt="">
                            <a href="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                data-title="{{ $gallery->title }}" data-lightbox="galeri">
                                <div class="card-img-overlay d-flex flex-column align-items-start">
                                    <div class="caption-overlay">
                                        <p class="fs-6 card-text fw-semibold text-white mt-auto lead"
                                            style="line-height: 1.3rem">
                                            {{ $gallery->title }}
                                            <br><span style="font-size: 0.8rem;font-weight: 300"><i
                                                    class="fa-solid fa-location-dot" style="color: #ff0000;"></i>
                                                {{ $gallery->location }}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <hr class="mt-4 mb-4">
        {{ $galleries->links() }}
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
