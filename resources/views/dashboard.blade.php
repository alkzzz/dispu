@extends('layouts.backend.layout')

@section('content')
    <div class="container">
        <h2 class="pb-2 border-bottom border-dark">Dashboard</h2>
        <div class="row">
            <h3 class="col-12 mt-4 fst-italic">Selamat Datang, {{ auth()->user()->name }}</h3>
            <hr>
            <div class="col-lg-4">
                <a href="{{ route('dashboard.halaman.index') }}" class="text-decoration-none">
                    <div class="card border-danger mb-3">
                        <div class="fs-4 card-header bg-danger text-white text-center">Halaman Statis</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-file-lines text-danger" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0 text-danger">Jumlah Halaman</h5>
                                        <p class="display-4 mb-0 text-danger">{{ $total_pages }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-danger text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('dashboard.kategori') }}" class="text-decoration-none">
                    <div class="card border-primary mb-3">
                        <div class="fs-4 card-header bg-primary text-white text-center">Kategori</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-list" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0">Jumlah Kategori</h5>
                                        <p class="display-4 mb-0">{{ $total_categories }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-primary text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('dashboard.berita.index') }}" class="text-decoration-none">
                    <div class="card border-success mb-3">
                        <div class="fs-4 card-header bg-success text-white text-center">Berita</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-newspaper text-success" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0 text-success">Jumlah Berita</h5>
                                        <p class="display-4 mb-0 text-success">{{ $total_posts }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-success text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col-lg-4">
                <a href="{{ route('dashboard.link') }}" class="text-decoration-none">
                    <div class="card border-info mb-3">
                        <div class="fs-4 card-header bg-info text-white text-center">Custom Links</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-link text-info" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0 text-info">Jumlah Link</h5>
                                        <p class="display-4 mb-0 text-info">{{ $total_links }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-info text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('dashboard.galeri.index') }}" class="text-decoration-none">
                    <div class="card border-warning mb-3">
                        <div class="fs-4 card-header bg-warning text-white text-center">Galeri</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-images text-warning" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0 text-warning">Jumlah Galeri</h5>
                                        <p class="display-4 mb-0 text-warning">{{ $total_galleries }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-warning text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('dashboard.link-terkait') }}" class="text-decoration-none">
                    <div class="card border-danger mb-3">
                        <div class="fs-4 card-header bg-danger text-white text-center">Link Terkait</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-sitemap text-danger" style="font-size:8rem"></i>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h5 class="card-title mb-0 text-danger">Jumlah Link</h5>
                                        <p class="display-4 mb-0 text-danger">{{ $total_related_links }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-6 fw-bold card-footer bg-danger text-white text-center">VIEW ALL</div>
                    </div>
                </a>
            </div>
        </div>
        @role('Super Admin')
            <hr>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.menu') }}" class="text-decoration-none">
                        <div class="card border-success mb-3">
                            <div class="fs-4 card-header bg-success text-white text-center">Menu</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-network-wired text-success" style="font-size:8rem"></i>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title mb-0 text-success">Jumlah Menu</h5>
                                            <p class="display-4 mb-0 text-success">{{ $total_menus }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-6 fw-bold card-footer bg-success text-white text-center">VIEW ALL</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.user') }}" class="text-decoration-none">
                        <div class="card border-danger mb-3">
                            <div class="fs-4 card-header bg-danger text-white text-center">User</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-users text-danger" style="font-size:8rem"></i>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title mb-0 text-danger">Jumlah User</h5>
                                            <p class="display-4 mb-0 text-danger">{{ $total_users }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-6 fw-bold card-footer bg-danger text-white text-center">VIEW ALL</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.backup') }}" class="text-decoration-none">
                        <div class="card border-info mb-3">
                            <div class="fs-4 card-header bg-info text-white text-center">Backup</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-database text-info" style="font-size:8rem"></i>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title mb-0 text-info">Backup Terakhir</h5>
                                            <p class="display-4 mb-0 text-info">{{ $day_backup }}</p>
                                            <p class="text-info">{{ $month_backup }} {{ $year_backup }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-6 fw-bold card-footer bg-info text-white text-center">VIEW ALL</div>
                        </div>
                    </a>
                </div>
            </div>
        @endrole
    </div>
@endsection
