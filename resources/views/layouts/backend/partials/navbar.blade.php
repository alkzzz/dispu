    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">DISPUPR Banjarbaru</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto">
            <a class="nav-link" href="#passwordModal" data-bs-toggle="modal" data-bs-target="#passwordModal">
                <i class="fa-solid fa-key align-middle"></i> Ubah Password
            </a>
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket align-middle"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-eye"></i></div>
                            Lihat Website
                        </a>
                        <div class="sb-sidenav-menu-heading">Manajemen Konten</div>
                        <a class="nav-link" href="{{ route('dashboard.halaman.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-file-lines"></i></div>
                            Halaman Statis
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.kategori') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            Kategori
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.berita.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                            Berita
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.link') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-link"></i></div>
                            Custom Links
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.galeri.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-images"></i></i></div>
                            Galeri
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.link-terkait') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-sitemap"></i></div>
                            Link Terkait
                        </a>
                        @role('Super Admin')
                            <div class="sb-sidenav-menu-heading">Manajemen Web</div>
                            <a class="nav-link" href="{{ route('dashboard.menu') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-network-wired"></i></div>
                                Menu
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.bidang') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                                Bidang
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.user') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.dokumen.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                                Dokumen
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.sosial-media') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-share-nodes"></i></div>
                                Media Sosial
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.gambar-depan') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-image"></i></div>
                                Foto Depan
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.link-icon.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-icons"></i></div>
                                Link Icon
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.saran.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments"></i></div>
                                Kotak Saran
                            </a>
                            <a class="nav-link" href="{{ route('kontak.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                                Kontak
                            </a>
                            <a class="nav-link" href="{{ route('kuesioner.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments"></i></div>
                                Kuesioner
                            </a>
                            <a class="nav-link" href="{{ route('dashboard.backup') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                                Backup
                            </a>
                        @endrole
                        <div class="sb-sidenav-menu-heading"></div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        @auth
                            {{ Auth::user()->name }}
                        @endauth
                    </div>
            </nav>
        </div>
