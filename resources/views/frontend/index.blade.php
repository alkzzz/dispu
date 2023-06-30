@extends('layouts.frontend.layout')

@section('content')
    <div class="row">
        <div class="container-fluid pb-md-3">
            <div id="carouselControls" class="carousel slide md-mh-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1000/800?random=1" class="d-block w-100" alt="Gambar Slider 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/800?random=2" class="d-block w-100" alt="Gambar Slider 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/800?random=3" class="d-block w-100" alt="Gambar Slider 3">
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
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang sekretariat.svg') }}"
                                        alt="Bidang Sekretariat" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Sekretariat</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang bina marga.svg') }}"
                                        alt="Bidang Bina Marga" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Bina Marga</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
                                    <img class="card-img-top mt-3" src="{{ asset('img/icon/icon bidang tata ruang.svg') }}"
                                        alt="Bidang Tata Ruang" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Tata Ruang</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
                                    <img class="card-img-top mt-3"
                                        src="{{ asset('img/icon/icon bidang cipta karya.svg') }}" alt="Bidang Cipta Karya"
                                        style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Cipta Karya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
                                    <img class="card-img-top mt-3"
                                        src="{{ asset('img/icon/icon bidang pengembangan konstruksi.svg') }}"
                                        alt="Bidang Pengembangan Konstruksi" style="width: 25%; margin: 0 auto;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bidang Pengembangan Konstruksi</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card d-flex justify-content-center h-100" style="width: 100%;">
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
    <div class="container py-3">
        <div class="row">
            <h3 class="text-center py-2 border-bottom border-1">Berita Terbaru</h3>
            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 24rem">
                        <img class="card-img-top" src="https://picsum.photos/200" alt="Card image cap"
                            style="max-height: 220px">
                        <div class="card-body">
                            <h5 class="card-title">Judul Berita 1</h5>
                            <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Deleniti,
                                dolores
                                architecto, magnam nobis explicabo, ex natus iste assumenda est iure quia amet quaerat quae
                                debitis? Dolorem alias aperiam deleniti perferendis. Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Eum voluptate minima est, quos iusto, qui quam repellendus cum totam harum
                                porro! Odit nobis quo nulla adipisci soluta a debitis deserunt!</p>
                            <a href="#" class="btn btn-primary">Read more..</a>
                        </div>
                        <div class="card-footer bg-white text-muted">
                            <i class="fa-solid fa-calendar fa-fw"></i> 30 Juni 2023
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 24rem;">
                        <img class="card-img-top" src="https://picsum.photos/200" alt="Card image cap"
                            style="max-height: 220px">
                        <div class="card-body">
                            <h5 class="card-title">Judul Berita 2</h5>
                            <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Deleniti, dolores
                                architecto, magnam nobis explicabo, ex natus iste assumenda est iure quia amet quaerat quae
                                debitis? Dolorem alias aperiam deleniti perferendis. Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Eum voluptate minima est, quos iusto, qui quam repellendus cum totam harum
                                porro! Odit nobis quo nulla adipisci soluta a debitis deserunt!</p>
                            <a href="#" class="btn btn-primary">Read more..</a>
                        </div>
                        <div class="card-footer bg-white text-muted">
                            <i class="fa-solid fa-calendar fa-fw"></i> 30 Juni 2023
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 24rem;">
                        <img class="card-img-top" src="https://picsum.photos/200" alt="Card image cap"
                            style="max-height: 220px">
                        <div class="card-body">
                            <h5 class="card-title">Judul Berita 3</h5>
                            <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Deleniti,
                                dolores
                                architecto, magnam nobis explicabo, ex natus iste assumenda est iure quia amet quaerat quae
                                debitis? Dolorem alias aperiam deleniti perferendis. Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Eum voluptate minima est, quos iusto, qui quam repellendus cum totam harum
                                porro! Odit nobis quo nulla adipisci soluta a debitis deserunt!</p>
                            <a href="#" class="btn btn-primary">Read more..</a>
                        </div>
                        <div class="card-footer bg-white text-muted">
                            <i class="fa-solid fa-calendar fa-fw"></i> 30 Juni 2023
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center py-2 mt-3">
                    <a name="" id="" class="btn btn-lg btn-primary" href="#" role="button">Lihat
                        Selengkapnya <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 py-4 bg-warning">
        <div class="container mb-3">
            <h3 class="text-center py-2 mt-2 border-bottom border-1 border-secondary">Galeri Kegiatan</h3>
            <div class="row mt-4">
                <div class="col-12 col-md mb-2 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://picsum.photos/300" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex flex-column align-items-start">
                            <p class="card-text fw-semibold text-white mt-auto lead" style="line-height: 1.3rem">
                                Pembangunan Gedung
                                <br><span style="font-size: 0.8rem;font-weight: 300"><i class="fa-solid fa-location-dot"
                                        style="color: #ff0000;"></i> Kecamatan
                                    Banjarbaru
                                    Utara</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-2 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://picsum.photos/300" class="img-fluid rounded" alt="">
                        <div class="card-img-overlay d-flex flex-column align-items-start">
                            <p class="card-text fw-semibold text-white mt-auto lead" style="line-height: 1.3rem">
                                Pembangunan Gedung
                                <br><span style="font-size: 0.8rem;font-weight: 300"><i class="fa-solid fa-location-dot"
                                        style="color: #ff0000;"></i> Kecamatan
                                    Banjarbaru
                                    Utara</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-2 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://picsum.photos/300" class="img-fluid rounded" alt="">
                        <div class="card-img-overlay d-flex flex-column align-items-start">
                            <p class="card-text fw-semibold text-white mt-auto lead" style="line-height: 1.3rem">
                                Pembangunan Gedung
                                <br><span style="font-size: 0.8rem;font-weight: 300"><i class="fa-solid fa-location-dot"
                                        style="color: #ff0000;"></i> Kecamatan
                                    Banjarbaru
                                    Utara</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-2 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://picsum.photos/300" class="img-fluid rounded" alt="">
                        <div class="card-img-overlay d-flex flex-column align-items-start">
                            <p class="card-text fw-semibold text-white mt-auto lead" style="line-height: 1.3rem">
                                Pembangunan Gedung
                                <br><span style="font-size: 0.8rem;font-weight: 300"><i class="fa-solid fa-location-dot"
                                        style="color: #ff0000;"></i> Kecamatan
                                    Banjarbaru
                                    Utara</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center py-2 mt-3">
                    <a name="" id="" class="btn btn-lg btn-primary" href="#" role="button">Lihat
                        Selengkapnya <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
