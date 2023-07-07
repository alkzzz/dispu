@extends('layouts.frontend.layout')

@section('title', 'Galeri Kegiatan')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('galeri') }}" class="text-dark">Galeri</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="p-2 border-bottom border-2 black" style="margin-bottom: 2rem">Galeri Kegiatan Dinas Pekerjaan Umum dan
            Penataan Ruang
            Kota Banjarbaru</h2>
        @for ($i = 0; $i < 2; $i++)
            <div class="row d-flex justify-content-center align-items-center">
                @for ($j = 0; $j < 3; $j++)
                    <div class="col-4 g-3">
                        @php $random = rand(1,20) @endphp
                        <div class="card">
                            <img src="https://picsum.photos/800?random={{ $random }}" class="img-fluid rounded"
                                alt="">
                            <a href="https://picsum.photos/1280/800"
                                data-title="Pembangunan Jembatan di Kecamatan Banjarbaru Utara" data-lightbox="galeri">
                                <div class="card-img-overlay d-flex flex-column align-items-start">
                                    <p class="card-text fw-semibold text-white mt-auto lead" style="line-height: 1.3rem">
                                        Pembangunan Gedung
                                        <br><span style="font-size: 0.8rem;font-weight: 300"><i
                                                class="fa-solid fa-location-dot" style="color: #ff0000;"></i> Kecamatan
                                            Banjarbaru
                                            Utara</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        @endfor
        <hr class="mt-4 mb-4">
        <div class="row">
            <nav class="d-flex justify-content-center" aria-label="Gallery Navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('lightbox/js/lightbox.min.js') }}"></script>
@endsection
