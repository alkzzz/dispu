<nav class="navbar
            navbar-expand-lg py-0 bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo Dinas PUPR Kota Banjarbaru">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-semibold" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index') }}">
                            <i class="fa-solid fa-house-chimney fa-lg fa-fw" style="line-height:1.4rem"></i>
                        </a>
                        @foreach ($frontmenus as $menu)
                        @if ($menu->parent_id == 0)
                            <li class="nav-item @if($menu->has_child) dropdown @endif ">
                                <a class="nav-link @if($menu->has_child) dropdown-toggle @endif" @if($menu->has_child) data-bs-toggle="dropdown"
                                    aria-expanded="false" href="#" @else href="{{ $menu->url }}" @endif role="button">
                                    {{ $menu->title }}
                                </a>
                                    @if ($menu->has_child)
                                    <ul class="dropdown-menu">
                                        @foreach ($menu->child as $child)
                                        @php $child = \App\Models\Menu::find($child) @endphp
                                        <li><a class="dropdown-item" href="{{ $child->url }}">{{ $child->title }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
</nav>

{{-- <nav class="navbar
            navbar-expand-lg py-0 bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo Dinas PUPR Kota Banjarbaru">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-semibold" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">
                            <i class="fa-solid fa-house-chimney fa-lg fa-fw" style="line-height:1.4rem"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tentang</a></li>
                            <li><a class="dropdown-item" href="#">Sambutan Kepala Dinas</a></li>
                            <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bidang
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Bidang Sekretariat</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Bina Marga</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Tata Ruang</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Cipta Karya</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Pengembangan Konstruksi</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Sumber Daya Air</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('berita') }}" role="button">
                            Berita
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Info
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Info 1</a></li>
                            <li><a class="dropdown-item" href="#">Info 2</a></li>
                            <li><a class="dropdown-item" href="#">Info 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Layanan 1</a></li>
                            <li><a class="dropdown-item" href="#">Layanan 2</a></li>
                            <li><a class="dropdown-item" href="#">Layanan 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('galeri') }}" role="button">
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button">
                            Kontak
                        </a>
                    </li>
                </ul>
                <div class="mt-2">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav> --}}
