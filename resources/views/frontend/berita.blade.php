@extends('layouts.frontend.layout')

@section('title', 'Berita')

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('galeri') }}" class="text-dark">Berita</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="border-bottom border-2 black" style="margin-bottom: 3rem">Berita Dinas Pekerjaan Umum dan Penataan Ruang
            Kota Banjarbaru</h2>
        <div class="row">
            <div class="col-8">
                <h3>Judul Berita</h3>
                <p class="fs-5" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quod
                    minima debitis
                    pariatur
                    labore praesentium
                    iusto voluptatibus in sit eius natus alias, soluta voluptate. Reprehenderit soluta voluptas odio,
                    velit
                    perferendis numquam! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente nisi
                    repellat
                    corrupti, quod facilis harum eum. Commodi saepe consequatur molestiae fugit doloremque asperiores
                    excepturi libero sapiente aliquam provident. Deserunt, officia!
                </p>
                <a name="" id="" class="btn btn-primary" href="{{ url('galeri') }}" role="button">Read
                    more..</a>

            </div>
            <div class="col-4">
                <div class="card shadow p-1 mb-3 bg-white rounded">
                    <img class="img-fluid" src="https://picsum.photos/500?random=1" alt="" srcset="">
                    <div class="card-img-overlay"></div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-4">
                <div class="card shadow p-1 mb-3 bg-white rounded">
                    <img class="img-fluid" src="https://picsum.photos/500?random=2" alt="" srcset="">
                    <div class="card-img-overlay"></div>
                </div>
            </div>
            <div class="col-8">
                <h3>Judul Berita</h3>
                <p class="fs-5" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                    minima debitis
                    pariatur
                    labore praesentium
                    iusto voluptatibus in sit eius natus alias, soluta voluptate. Reprehenderit soluta voluptas odio, velit
                    perferendis numquam! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente nisi repellat
                    corrupti, quod facilis harum eum. Commodi saepe consequatur molestiae fugit doloremque asperiores
                    excepturi libero sapiente aliquam provident. Deserunt, officia!
                </p>
                <a name="" id="" class="btn btn-primary" href="{{ url('galeri') }}" role="button">Read
                    more..
                </a>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-8">
                <h3>Judul Berita</h3>
                <p class="fs-5" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                    minima debitis
                    pariatur
                    labore praesentium
                    iusto voluptatibus in sit eius natus alias, soluta voluptate. Reprehenderit soluta voluptas odio, velit
                    perferendis numquam! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente nisi repellat
                    corrupti, quod facilis harum eum. Commodi saepe consequatur molestiae fugit doloremque asperiores
                    excepturi libero sapiente aliquam provident. Deserunt, officia!
                </p>
                <a name="" id="" class="btn btn-primary" href="{{ url('galeri') }}" role="button">Read
                    more..
                </a>

            </div>
            <div class="col-4">
                <div class="card shadow p-1 mb-3 bg-white rounded">
                    <img class="img-fluid" src="https://picsum.photos/500?random=3" alt="" srcset="">
                    <div class="card-img-overlay"></div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row mt-4">
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
