<nav class="navbar navbar-expand-lg py-0 bg-body-tertiary">
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
                <li class="nav-item @if ($menu->has_child) dropdown @endif ">
                    <a class="nav-link @if ($menu->has_child) dropdown-toggle @endif"
                        @if ($menu->has_child) data-bs-toggle="dropdown"
                                        aria-expanded="false" href="#" @else href="{{ $menu->url }}" @endif
                        role="button">
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
                </li>
                @endif
                @endforeach
                </li>
            </ul>
            <!-- Add the search box here -->
            <div class="mt-2">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
