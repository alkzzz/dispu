<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Dinas Pekerjaan Umum dan Penataan Ruang mempunyai tugas melaksanakan urusan pemerintahan yang menjadi kewenangan Daerah dan tugas pembantuan di bidang pekerjaan umum, penataan ruang dan pertanahan">
    <meta name="keywords" content="Dinas PUPR, PUPR, PU, Banjarbaru">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <style>
        body {
            background: white;
            font-family: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif !important;
            font-size: 16px !important;
        }

        .navbar-brand {
            margin-left: -1rem;
        }

        .nav-item a {
            font-size: 1rem;
            color: #36454F;
        }

        .dropdown-menu a {
            font-size: 0.9rem;
            color: #36454F;
            font-weight: 500;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 65vh;
        }

        .wrapper>.container-fluid:last-child {
            margin-top: auto;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: black;
            content: "/";
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('extra_css')

</head>

<body onload=display_ct();>
    <div class="py-2" style="background-color:#030f6b">
        <div class="container-fluid align-items-center small">
            <div class="row">
                <div class="col-md-4 col-lg-4 text-center">
                    <p id="tanggal" class="text-light  mb-0"></p>
                </div>
                @auth
                <div class="col-md-4 col-lg-4 text-center">
                        <a class="text-white" href="{{ route('dashboard') }}">Halaman Admin</a>
                    </div>
                @endauth
                <div class="col-md-4 col-lg-4 text-center">
                    @php
                        $socmeds = \DB::table('socmeds')
                            ->orderBy('name')
                            ->get();
                    @endphp
                    @foreach ($socmeds as $socmed)
                        <a href="{{ $socmed->link }}" target="_blank" class="mx-3" style="color:transparent">
                            <i class="fa-brands fa-{{ strtolower($socmed->name) }} fa-lg text-light"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.partials.navbar')

    @yield('header-title')

    @yield('breadcrumb')

    <main>
        @yield('content')
    </main>

    @include('layouts.frontend.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/utc.min.js"
        integrity="sha512-z84O912dDT9nKqvpBnl1tri5IN0j/OEgMzLN1GlkpKLMscs5ZHVu+G2CYtA6dkS0YnOGi3cODt3BOPnYc8Agjg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/timezone.min.js"
        integrity="sha512-fG1tT/Wn/ZOyH6/Djm8HQBuqvztPQdK/vBgNFLx6DQVt3yYYDPN3bXnGZT4z4kAnURzGQwAnM3CspmhLJAD/5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/customParseFormat.min.js"
        integrity="sha512-FM59hRKwY7JfAluyciYEi3QahhG/wPBo6Yjv6SaPsh061nFDVSukJlpN+4Ow5zgNyuDKkP3deru35PHOEncwsw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        dayjs.locale('id')
        dayjs.extend(window.dayjs_plugin_utc)
        dayjs.extend(window.dayjs_plugin_timezone);
        dayjs.extend(window.dayjs_plugin_customParseFormat);
    </script>
    <script>
        function display_c() {
            var refresh = 1000;
            mytime = setTimeout('display_ct()', refresh)
        }

        function display_ct() {
            var dayjsParser = document.querySelector("#tanggal")
            dayjsParser.innerHTML = dayjs().tz('Asia/Makassar').format('dddd, DD MMMM YYYY | HH:mm:ss') + ' WITA'
            display_c()
        }
    </script>
    @yield('extra_js')

</body>

</html>
