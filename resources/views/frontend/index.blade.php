@extends('layouts.frontend.layout')

@section('extra_css')
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
        defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
    <style>
        #carouselControls .carousel-item img {
            object-fit: cover;
            object-position: center;
            height: 80vh;
            overflow: hidden;
        }

        .carousel-caption {
            background-color: rgba(7, 12, 56, 0.7);
            color: #fff;
            padding: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            min-height: 6rem
        }

        .caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(7, 12, 56, 0.7);
            color: #fff;
            padding: 10px;
        }

        .bidang-card-style {
            width: 100%;
            min-height: 10rem;
            background-color: #f8f9fa;
        }

        .bidang-card-style table {
            height: 100%;
        }

        .bidang-card-style td {
            vertical-align: middle;
        }

        .card-title {
            color: black;
        }

        .img-fluid.icon:hover {
            cursor: pointer;
        }

        @media (max-width: 767.98px) {
            .carousel-caption .h4 {
                font-size: 1rem;
                /* You can adjust the font size as per your preference */
            }
        }
    </style>
@endsection

@section('content')
    <div class="">
        <div class="pb-md-3">
            <div id="carouselControls" class="carousel slide md-mh-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($featured as $feat)
                        <div class="carousel-item @if ($loop->index == 0) active @endif">
                            <img src="@if ($feat->getFirstMediaUrl('berita', 'large')) {{ $feat->getFirstMediaUrl('berita', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                class="d-block w-100" alt="Gambar {{ $feat->title }}" style="height:370pt">
                            <div class="carousel-caption text-center py-3">
                                <p class="h4 text-sm">{{ $feat->title }}</p>
                                <a href="{{ route('frontend.getPost', $feat->slug) }}" class="btn btn-primary px-4 py-2 rounded-pill small">Informasi Lebih Lanjut <i
                                        class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container-fluid">
            <div class="jumbotron my-3 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-4 order-2">
                            <div class="container">
                                <h5 class="fw-bold" style="color: #ffc107">Dinas Pekerjaan Umum dan Penataan Ruang Kota
                                    Banjarbaru</h5>
                                <h3 class="fw-bold" style="">Selamat Datang di Website Resmi <br>Dinas
                                    Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</h3>
                                <p class="lead" style="text-align: justify">{!! \Str::words($sambutan->content, 133) !!}
                                </p>
                                <p>
                                    <b>Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</b>,
                                    <b>{{ $gambardepan->nama }}</b>
                                </p>
                                <a class="btn btn-primary px-4 py-2 rounded-pill small" href="{{ url('sambutan-kepala-dinas') }}"
                                    role="button">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 d-flex justify-content-center px-0">
                            <img src="@if ($gambardepan) {{ asset($gambardepan->link) }} @else  {{ asset('img/Gambar Section 1.png') }} @endif"
                                alt="Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class=" py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="px-0 col-12 col-md-5">
                    <img class="img-fluid py-md-5" src="{{ asset('img/Gambar Section 2.png') }}" alt="Image" />
                </div>
                <div class="col-12 col-md-7 bg-warning rounded-3">
                    <div class="px-4 py-4">
                        <h2 class="fw-bold mt-4" style="line-height: 2.5rem">Bidang Dinas Pekerjaan Umum dan Penataan Ruang
                            Kota Banjarbaru
                        </h2>
                        <h5 class="mb-4" style="line-height: 2rem">Terdapat 6 Bidang Unit Organisasi dalam Dinas Pekerjaan
                            Umum dan
                            Penataan Ruang <br> Kota
                            Banjarbaru
                        </h5>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none" href="{{ url('kategori/sekretariat') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-4"
                                                        src="{{ asset('img/icon/icon bidang sekretariat.svg') }}"
                                                        alt="Bidang Sekretariat" style="width: 27%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Sekretariat</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none" href="{{ url('kategori/bina-marga') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-4"
                                                        src="{{ asset('img/icon/icon bidang bina marga.svg') }}"
                                                        alt="Bidang Bina Marga" style="width: 30%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Bina Marga</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none" href="{{ url('kategori/tata-ruang') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-4"
                                                        src="{{ asset('img/icon/icon bidang tata ruang.svg') }}"
                                                        alt="Bidang Tata Ruang" style="width: 25%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Tata Ruang</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none" href="{{ url('kategori/cipta-karya') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-4"
                                                        src="{{ asset('img/icon/icon bidang cipta karya.svg') }}"
                                                        alt="Bidang Cipta Karya" style="width: 25%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Cipta Karya</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none"
                                    href="{{ url('kategori/pengembangan-konstruksi') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-3"
                                                        src="{{ asset('img/icon/icon bidang pengembangan konstruksi.svg') }}"
                                                        alt="Bidang Pengembangan Konstruksi"
                                                        style="width: 24%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Pengembangan Konstruksi</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <a class="text-decoration-none" href="{{ url('kategori/sumber-daya-air') }}">
                                    <div class="card bidang-card-style">
                                        <table class="h-100 w-100">
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <img class="card-img-top mt-4"
                                                        src="{{ asset('img/icon/icon bidang sumber daya air.svg') }}"
                                                        alt="Bidang Sumber Daya Air"
                                                        style="width: 25%; margin: 0 auto;" />
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Bidang Sumber Daya Air</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid" style="background: #f0f0f0">
        <div class="container py-3">
            <div class="row d-flex justify-content-center">
                <h4 class="text-center py-2 text-uppercase">Berita Terbaru</h4>
                <div class="row mt-2">
                    @foreach ($latest as $late)
                        <div class="col-md-4 col-sm-12 d-flex justify-content-center g-3">
                            <div class="card h-100">
                                <img class="card-img-top object-fit-cover"
                                src="@if ($late->getFirstMediaUrl('berita', 'preview')) {{ $late->getFirstMediaUrl('berita', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif" alt="image" height="180">
                                <div class="card-body pb-1">
                                    <h5 class="card-title mb-0">{{ $late->title }}</h5>
                                </div>
                                <div class="card-body py-0">
                                    <p class="small">{!! \Str::words($late->content, 30) !!}</p>
                                </p></div>
                                <div class="card-body py-0">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('frontend.getPost', $late->slug) }}" class="btn btn-outline-primary h-75 pt-1">Read More &nbsp;<i class="fa-solid fa-angles-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body py-3 ">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted small lh-1">{{ $late->created_at->translatedFormat('l, j F Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    <a class="btn btn-primary px-4 py-2 rounded-pill small" href="{{ route('frontend.berita.index') }}" role="button">Lihat
                        Semua Berita </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background: #030f6b">
        <div class="container py-4">
            <div class="d-flex">
                <div class="flex-shrink-0 me-2">
                    <a href="https://lapor.go.id" target="_blank"><img width="150" src="{{ asset('logo/lapor-logo.png') }}" alt=""></a>
                </div>
                <div class="flex-grow-1">
                    <h6 class="text-uppercase text-white mb-1 mt-2">SARAN DAN PENGADUAN</h6>
                    <h6 class="small text-white fw-light">Saran dan masukan untuk kemajuan PUPR Kota Banjarbaru.</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="py-5 px-3 swiffy-slider slider-item-show5 slider-nav-outside slider-nav-dark slider-nav-sm slider-nav-visible slider-nav-page slider-item-snapstart slider-nav-autoplay slider-nav-autopause slider-item-ratio slider-item-ratio-contain slider-item-ratio-32x9 bg-white py-3 py-lg-4"
            data-slider-nav-autoplay-interval="2000" style="background-color: transparent">
            <div class="slider-container">
                @foreach ($linkicons as $linkicon)
                    <div>
                        <img class="img-fluid" alt="{{ $linkicon->title }}"
                            src="@if ($linkicon->getFirstMediaUrl('link-icon', 'preview')) {{ $linkicon->getFirstMediaUrl('link-icon', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                            onclick="window.open('{{ $linkicon->url }}', '_blank');">
                    </div>
                @endforeach
            </div>
            <button type="button" class="slider-nav" aria-label="Go left"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>

        </div>
    </div>
    <div class="mt-0">
        <div class="container-fluid gallery-info">
            <div class="container py-3">
                <h4 class="text-center py-2 mt-2 text-uppercase">Galeri Kegiatan</h4>
                @foreach ($galleries->chunk(4) as $galleryChunk)
                    <div class="row d-flex justify-content-center align-items-center">
                        @foreach ($galleryChunk as $gallery)
                            <div class="col-md-3 col-sm-12 g-3">
                                <div class="card">
                                    <img src="@if ($gallery->getFirstMediaUrl('galeri', 'preview')) {{ $gallery->getFirstMediaUrl('galeri', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        class="img-fluid rounded" alt="Gambar {{ $gallery->title }}">
                                    <a href="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        data-title="{{ $gallery->title }}" data-lightbox="galeri">
                                        <div class="card-img-overlay d-flex flex-column align-items-start">
                                            <div class="caption-overlay">
                                                <p class="card-text fw-semibold text-white mt-auto lead"
                                                    style="line-height: 1.3rem;font-size:1rem">
                                                    {{ $gallery->title }}
                                                    <br><span style="font-size: 0.8rem;font-weight: 300"><i
                                                            class="fa-solid fa-location-dot" style="color: #ff0000;"></i>&nbsp; {{ $gallery->location }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-12 d-flex justify-content-center py-2 mt-3">
                        <a name="" id="" class="btn btn-primary px-4 py-2 rounded-pill small"
                            href="{{ route('frontend.galeri.index') }}" role="button">Lihat Semua Galeri</a>
                    </div>
                </div>
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
