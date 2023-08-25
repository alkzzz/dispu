@extends('layouts.frontend.layout')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
    <style>
        #carouselControls .carousel-item img {
            object-fit: cover;
            object-position: center;
            height: 80vh;
            overflow: hidden;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
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
            background-color: rgba(0, 0, 0, 0.6);
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

        @media (max-width: 767.98px) {
            .carousel-caption .h4 {
                font-size: 1rem;
                /* You can adjust the font size as per your preference */
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="container-fluid pb-md-3">
            <div id="carouselControls" class="carousel slide md-mh-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($featured as $feat)
                        <div class="carousel-item @if ($loop->index == 0) active @endif">
                            <img src="@if ($feat->getFirstMediaUrl('berita', 'large')) {{ $feat->getFirstMediaUrl('berita', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                class="d-block w-100" alt="Gambar {{ $feat->title }}">
                            <div class="carousel-caption text-center">
                                <p class="h4 text-sm">{{ $feat->title }}</p>
                                <a href="{{ route('frontend.getPost', $feat->slug) }}" class="btn btn-primary">Read More <i
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
    <div class="row">
        <div class="container-fluid">
            <div class="jumbotron my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-4 order-2">
                            <div class="container">
                                <h5 class="fw-semibold" style="color: #FFD42B">Dinas Pekerjaan Umum dan Penataan Ruang Kota
                                    Banjarbaru</h5>
                                <h2 class="fw-bold" style="line-height: 2.5rem">Selamat Datang di Website Resmi <br>Dinas
                                    Pekerjaan Umum dan Penataan
                                    Ruang
                                    Kota Banjarbaru</h2>
                                <p class="lead" style="text-align: justify">{!! \Str::words($sambutan->content, 133) !!}
                                </p>
                                <p><b>Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</b></p>
                                <p><b>Eka Yuliesda Akbari, ST, MT</b></p>
                                <a class="btn btn-primary btn-lg" href="{{ url('sambutan-kepala-dinas') }}"
                                    role="button">Selengkapnya <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 d-flex justify-content-center px-0">
                            <img src="{{ asset('img/Gambar Section 1.png') }}" alt="Jumbotron Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
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
                                <a class="text-decoration-none" href="{{ url('kategori/bidang-sekretariat') }}">
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
                                <a class="text-decoration-none" href="{{ url('kategori/bidang-bina-marga') }}">
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
                                <a class="text-decoration-none" href="{{ url('kategori/bidang-tata-ruang') }}">
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
                                <a class="text-decoration-none" href="{{ url('kategori/bidang-cipta-karya') }}">
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
                                    href="{{ url('kategori/bidang-pengembangan-konstruksi') }}">
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
                                <a class="text-decoration-none" href="{{ url('kategori/bidang-sumber-daya-air') }}">
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
    </div>
    <div class="container py-3">
        <div class="row d-flex justify-content-center">
            <h3 class="text-center py-2 border-bottom border-1">Berita Terbaru</h3>
            <div class="row mt-2">
                @foreach ($latest as $late)
                    <div class="col-md-4 col-sm-12 d-flex justify-content-center">
                        <div class="card shadow p-1 mb-4 bg-white rounded" style="width: 24rem">
                            <img class="card-img-top"
                                src="@if ($late->getFirstMediaUrl('berita', 'preview')) {{ $late->getFirstMediaUrl('berita', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                alt="Card image cap" style="max-height: 220px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $late->title }}</h5>
                                <p class="card-text" style="text-align: justify">{!! \Str::words($late->content, 50) !!}</p>
                                <a href="{{ route('frontend.getPost', $late->slug) }}" class="btn btn-primary">Read More
                                    <i class="fa-solid fa-angles-right"></i></a>
                            </div>
                            <div class="card-footer bg-white text-muted">
                                <i class="fa-solid fa-calendar fa-fw"></i>
                                {{ $late->created_at->translatedFormat('l, j F Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a class="btn btn-lg btn-primary" href="{{ route('frontend.berita.index') }}" role="button">Lihat
                    Semua Berita <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 py-4" style="background: #FFF5CC">
        <div class="container mb-3">
            <h3 class="text-center py-2 mt-2 border-bottom border-1 border-secondary">Galeri Kegiatan</h3>
            @foreach ($galleries->chunk(3) as $galleryChunk)
                <div class="row d-flex justify-content-center align-items-center">
                    @foreach ($galleryChunk as $gallery)
                        <div class="col-md-4 col-sm-12 g-3">
                            <div class="card border-dark">
                                <img src="@if ($gallery->getFirstMediaUrl('galeri', 'preview')) {{ $gallery->getFirstMediaUrl('galeri', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                    class="img-fluid rounded" alt="Gambar {{ $gallery->title }}">
                                <a href="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                    data-title="{{ $gallery->title }}" data-lightbox="galeri">
                                    <div class="card-img-overlay d-flex flex-column align-items-start">
                                        <div class="caption-overlay">
                                            <p class="card-text fw-semibold text-white mt-auto lead"
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
            <div class="row">
                <div class="col-12 d-flex justify-content-center py-2 mt-3">
                    <a name="" id="" class="btn btn-lg btn-primary"
                        href="{{ route('frontend.galeri.index') }}" role="button">Lihat Semua Galeri <i
                            class="fa-solid fa-arrow-right-long"></i></a>
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
