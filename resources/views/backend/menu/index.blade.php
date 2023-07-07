@extends('layouts.backend.layout')

@section('extra_css')
    <style>
        .accordion-button:not(.collapsed) {
            color: black;
            background-color: white;
        }

        .accordion-button:after {
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000000'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>") !important;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(0, 0, 0, .125);
        }

        #menu .no-child.accordion-button:not(.collapsed)::after,
        #menu .no-child.accordion-button::after {
            background-image: unset !important;
        }
    </style>
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Menu</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif

        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header bg-dark text-white fs-5">
                    Tambah Menu
                </div>
                <div class="accordion" id="selectMenuItem">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#pageCollapse" aria-expanded="true" aria-controls="pageCollapse">
                                Halaman Statis
                            </button>
                        </h2>
                        <div id="pageCollapse" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Checked checkbox
                                    </label>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" value="" id="selectAllMenu">
                                        <label class="form-check-label fw-semibold" for="selectAllMenu">
                                            Select All
                                        </label>
                                    </div>
                                    <div>
                                        <a name="" id="" class="btn btn-primary" href="#"
                                            role="button">Add Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Kategori
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Checked checkbox
                                    </label>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" value="" id="selectAllMenu">
                                        <label class="form-check-label fw-semibold" for="selectAllMenu">
                                            Select All
                                        </label>
                                    </div>
                                    <div>
                                        <a name="" id="" class="btn btn-primary" href="#"
                                            role="button">Add Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Custom Links
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Checked checkbox
                                    </label>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="selectAllMenu">
                                        <label class="form-check-label fw-semibold" for="selectAllMenu">
                                            Select All
                                        </label>
                                    </div>
                                    <div>
                                        <a name="" id="" class="btn btn-primary" href="#"
                                            role="button">Add Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="d-block d-md-none mt-3 border border-primary border-1">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header bg-dark text-white fs-5">
                    Atur Menu
                </div>
                <div class="accordion parent" id="menu">
                    <div class="accordion-item fixed">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button bg-warning text-dark no-child" type="button" disabled>
                                <i class="fa-solid fa-house-chimney fa-lg pe-2"></i>Home
                            </button>
                        </h2>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingMenu-1">
                            <button class="accordion-button collapsed bg-warning text-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#menu-1" aria-expanded="true"
                                aria-controls="menu-1">
                                <i class="fa-solid fa-up-down-left-right fa-lg pe-2"></i><span
                                    id="judulmenu-1">Profil</span>
                            </button>
                        </h2>
                        <div id="menu-1" class="accordion-collapse collapse" aria-labelledby="headingMenu-1"
                            data-bs-parent="#menu">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <form action="#">
                                        <label for="inputmenu-1" class="form-label"
                                            style="font-size: 0.9rem;font-style: italic">Label
                                            Menu</label>
                                        <input id="labelinput-1" type="text" class="form-control" value="Profil"
                                            oninput="renameMenu()" required>
                                        <button id="labelbutton-1" type="submit"
                                            class="d-none btn btn-sm btn-success mt-2">Save</button>
                                    </form>
                                </div>
                                <div class="accordion child" id="submenu">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="sub-headingOne">
                                            <button class="accordion-button bg-warning text-dark" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#sub-menu-1"
                                                aria-expanded="true" aria-controls="sub-menu-1">
                                                Accordion Item #1
                                            </button>
                                        </h2>
                                        <div id="sub-menu-1" class="accordion-collapse" aria-labelledby="sub-headingOne"
                                            data-bs-parent="#sub-accordionMenu">
                                            <div class="accordion-body">
                                                <strong>This is the first item's accordion body.</strong> It is hidden
                                                by
                                                default, until the collapse plugin adds the appropriate classes that we
                                                use
                                                to
                                                style each element. These classes control the overall appearance, as
                                                well as
                                                the
                                                showing and hiding via CSS transitions. You can modify any of this with
                                                custom
                                                CSS or overriding our default variables. It's also worth noting that
                                                just
                                                about
                                                any HTML can go within the <code>.accordion-body</code>, though the
                                                transition
                                                does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="sub-headingTwo">
                                            <button class="accordion-button bg-warning text-dark collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#sub-menu-2"
                                                aria-expanded="false" aria-controls="sub-menu-2">
                                                Accordion Item #2
                                            </button>
                                        </h2>
                                        <div id="sub-menu-2" class="accordion-collapse collapse"
                                            aria-labelledby="sub-headingTwo" data-bs-parent="#sub-accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the second item's accordion body.</strong> It is hidden
                                                by
                                                default, until the collapse plugin adds the appropriate classes that we
                                                use
                                                to
                                                style each element. These classes control the overall appearance, as
                                                well as
                                                the
                                                showing and hiding via CSS transitions. You can modify any of this with
                                                custom
                                                CSS or overriding our default variables. It's also worth noting that
                                                just
                                                about
                                                any HTML can go within the <code>.accordion-body</code>, though the
                                                transition
                                                does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button bg-warning text-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <i class="fa-solid fa-up-down-left-right fa-lg pe-2"></i><span>Accordion Item #2</span>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="inputmenu-1" class="form-label"
                                        style="font-size: 0.9rem;font-style: italic">Label
                                        Menu</label>
                                    <input id="inputmenu-1" type="text" class="form-control" value="Profil"
                                        oninput="renameMenu()">
                                </div>
                                <div class="accordion" id="submenu"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button bg-warning text-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                <i class="fa-solid fa-up-down-left-right fa-lg pe-2"></i><span>Accordion Item #3</span>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="inputmenu-1" class="form-label"
                                        style="font-size: 0.9rem;font-style: italic">Label
                                        Menu</label>
                                    <input id="inputmenu-1" type="text" class="form-control" value="Profil"
                                        oninput="renameMenu()">
                                </div>
                                <div class="accordion" id="submenu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a name="" id="" class="btn btn-success" href="#" role="button">Urutkan Menu</a>
            </div>
        </div>
    @endsection

    @section('extra_js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
            integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var parent = [].slice.call(document.querySelectorAll('.parent'));
            for (var i = 0; i < parent.length; i++) {
                new Sortable(parent[i], {
                    group: 'parent',
                    animation: 200,
                    fallbackOnBody: true,
                    swapThreshold: 0.65
                });
            }

            var child = [].slice.call(document.querySelectorAll('.child'));
            for (var i = 0; i < child.length; i++) {
                new Sortable(child[i], {
                    group: 'child',
                    animation: 200,
                    fallbackOnBody: true,
                    swapThreshold: 0.65
                });
            }
        </script>
        <script>
            function renameMenu() {
                let button = document.getElementById("labelbutton-1")
                button.classList.remove("d-none");
                let text = document.getElementById("labelinput-1").value
                document.getElementById("judulmenu-1").innerHTML = text
            }
        </script>
    @endsection
