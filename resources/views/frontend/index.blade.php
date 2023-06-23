@extends('layouts.frontend.layout')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1000/800?random=1" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/800?random=2" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/800?random=3" class="d-block w-100" alt="...">
                    </div>
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
    <div class="row bg-white">
        <div class="container-fluid">
            <div class="jumbotron my-5 md-my-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 md-mt-2 mt-5 order-2">
                            <div class="container">
                                <h5 class="fw-semibold" style="color: #FFD42B">Dinas Pekerjaan Umum dan Penataan Ruang Kota
                                    Banjarbaru</h5>
                                <h2 class="fw-bold" style="line-height: 2.5rem">Selamat Datang di Website Resmi <br>Dinas
                                    Pekerjaan Umum dan Penataan
                                    Ruang
                                    Kota Banjarbaru</h2>
                                <p class="lead" style="text-align: justify">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. A, ea similique,
                                    veritatis pariatur repellat, vitae expedita nam ut repellendus maxime provident
                                    cupiditate
                                    animi voluptate. Qui accusamus fugiat rem. Vero, illo.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus architecto omnis
                                    alias
                                    eos fuga velit nemo neque tempore quibusdam, earum totam fugit atque nulla illo, vitae
                                    laboriosam, officia dolorem eveniet?
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, eveniet ex debitis
                                    quis nulla esse quibusdam, reiciendis quod quas nesciunt doloribus totam dicta tempore
                                    impedit aliquam, expedita sit repellat nemo.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit beatae ipsum iure nobis
                                    provident, voluptatum consequatur optio ratione iste, iusto pariatur, illo itaque aut
                                    non
                                    molestias voluptas neque quod cumque.</p>
                                <a class="btn btn-primary btn-lg" href="#" role="button">Selengkapnya <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
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
    <div class="row">
        <div class="container-fluid">
            <div class="row bg-white">
                <div class="px-0 col-12 col-md-5 d-none d-md-block">
                    <div style="padding-top: 5rem; padding-bottom: 5rem">
                        <img class="img-fluid" src="{{ asset('img/Gambar Section 2.png') }}" alt="Image" />
                    </div>
                </div>
                <div class="col-12 col-md-7 bg-warning rounded-3">
                    <div style="padding-left: 2rem; padding-top: 5rem">
                        <h2 class="fw-bold mt-4" style="line-height: 2.5rem">Bidang Dinas Pekerjaan Umum dan Penataan Ruang
                            <br>Kota Banjarbaru
                        </h2>
                        <h5 class="mb-4" style="line-height: 2rem">Terdapat 6 Bidang Unit Organisasi dalam Dinas Pekerjaan
                            Umum dan
                            Penataan Ruang <br> Kota
                            Banjarbaru
                        </h5>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang sekretariat.svg') }}"
                                        alt="Bidang Sekretariat" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Sekretariat</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang bina marga.svg') }}"
                                        alt="Bidang Bina Marga" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Bina Marga</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang tata ruang.svg') }}"
                                        alt="Bidang Tata Ruang" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Tata Ruang</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3"
                                        src="{{ asset('img/icon/icon bidang cipta karya.svg') }}" alt="Bidang Cipta Karya"
                                        style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Cipta Karya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3"
                                        src="{{ asset('img/icon/icon bidang pengembangan konstruksi.svg') }}"
                                        alt="Bidang Pengembangan Konstruksi" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Pengembangan Konstruksi</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 15rem;">
                                    <img class="card-img-top mt-3"
                                        src="{{ asset('img/icon/icon bidang sumber daya air.svg') }}"
                                        alt="Bidang Sumber Daya Air" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Sumber Daya Air</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="card text-center rounded-0 border-0">
            <div class="card-header pt-4 mb-2" style="background-color: transparent;border: none">
                <h3>Media Sosial</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
