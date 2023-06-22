<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</title>
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
            font-family: 'Inter', sherif;
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

        #carouselControls .carousel-item img {
            object-fit: cover;
            object-position: center;
            height: 70vh;
            overflow: hidden;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper>.container-fluid:last-child {
            margin-top: auto;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: black;
            content: "/";
        }
    </style>

</head>

<body onload=display_ct();>
    <div class="py-2" style="background-color:#030f6b">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <p id="tanggal" class="text-light mb-0"></p>
            </div>
            <div>
                <a href="https://www.facebook.com" class="mx-3" style="color:transparent">
                    <i class="fa-brands fa-facebook-f fa-lg text-light"></i>
                </a>
                <a href="https://www.twitter.com" class="mx-3" style="color:transparent">
                    <i class="fa-brands fa-twitter fa-lg text-light"></i>
                </a>
                <a href="https://www.youtube.com" class="mx-3" style="color:transparent">
                    <i class="fa-brands fa-youtube fa-lg text-light"></i>
                </a>
                <a href="https://www.instagram.com" class="mx-3" style="color:transparent">
                    <i class="fa-brands fa-instagram fa-lg text-light"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="navbar
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
                            <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Berita
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Info
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
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
    </nav>

    @yield('breadcrumb')

    <main>
        @yield('content')
    </main>

    <div class="wrapper">
        <div class="container-fluid text-light px-0" style="background-color: #3c52f9">
            <div class="row row-cols-5 py-5">
                <div class="col">
                    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                    <h5 class="text-light text-center">Link Terkait</h5>
                </div>
                <div class="col">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                    </ul>
                </div>

                <div class="col-md-4 align-center">
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31860.240441941136!2d114.80843005366125!3d-3.463692138653264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681cc99b0a255%3A0x953f3f7bf07a4696!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang%20Kota%20Banjarbaru!5e0!3m2!1sen!2sid!4v1681030290577!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="container-fluid align-middle px-0" style="background-color:#030f6b">
                <footer class="py-3">
                    <p class="text-center text-light mb-0">Copyright © 2023 Dinas Pekerjaan Umum dan Penataan Ruang.
                        All
                        Rights Reserved.</p>
                </footer>
            </div>
        </div>


    </div>

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
            dayjsParser.innerHTML = dayjs().tz('Asia/Makassar').format('DD MMMM YYYY | HH:mm:ss') + ' WITA'
            display_c()
        }
    </script>

    <script src="{{ asset('js/replaceme.min.js') }}"></script>
    <script>
        var replace = new ReplaceMe(document.querySelector('.news-rotator'), {
            animation: 'animated fadeInDown', // Animation class or classes
            speed: 3000, // Delay between each phrase in miliseconds
            separator: ';', // Phrases separator
            hoverStop: false, // Stop rotator on phrase hover
            clickChange: false, // Change phrase on click
            loopCount: 'infinite', // Loop Count - 'infinite' or number
            autoRun: true, // Run rotator automatically
            onInit: false, // Function
            onChange: false, // Function
            onComplete: false // Function
        });
    </script>


</body>

</html>
