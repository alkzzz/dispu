@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- Select2 BS5-theme --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
                        <h2 class="accordion-header" id="headingPage">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#selectPageMenu" aria-expanded="true" aria-controls="selectPageMenu">
                                Halaman Statis
                            </button>
                        </h2>
                        <div id="selectPageMenu" class="accordion-collapse collapse" aria-labelledby="headingPage"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                @foreach ($pages as $page)
                                    <div class="form-check">
                                        <input class="form-check-input addMenu" type="checkbox" value=""
                                            id="pageCheck">
                                        <label class="form-check-label" for="pageCheck">
                                            {{ $page->title }}
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary disabled btnAddMenu" href="#" role="button"><i
                                            class="fa-solid fa-plus fa-sm"></i> Add to Menu</a>
                                    <a id="btn-submenu-page" data-bs-toggle="modal" data-bs-target="#modal-submenu"
                                        class="btn btn-sm btn-info disabled btnAddSubMenu" href="#" role="button"><i
                                            class="fa-solid fa-plus fa-sm"></i> Add
                                        to Submenu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#selectCategoryMenu" aria-expanded="false"
                                aria-controls="selectCategoryMenu">
                                Kategori
                            </button>
                        </h2>
                        <div id="selectCategoryMenu" class="accordion-collapse collapse" aria-labelledby="headingCategory"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input addMenu" type="checkbox" value=""
                                            id="categoryCheck">
                                        <label class="form-check-label" for="categoryCheck">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a name="" id="" class="btn btn-sm btn-primary btnAddMenu disabled"
                                        href="#" role="button"><i class="fa-solid fa-plus fa-sm"></i> Add to Menu</a>
                                    <a id="btn-submenu-kategori" data-bs-toggle="modal" data-bs-target="#modal-submenu"
                                        class="btn btn-sm btn-info btnAddSubMenu disabled" href="#" role="button"><i
                                            class="fa-solid fa-plus fa-sm"></i> Add
                                        to Submenu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingLinks">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#selectLinkMenu" aria-expanded="false" aria-controls="selectLinkMenu">
                                Custom Links
                            </button>
                        </h2>
                        <div id="selectLinkMenu" class="accordion-collapse collapse" aria-labelledby="headingLinks"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                @foreach ($links as $link)
                                    <div class="form-check">
                                        <input class="form-check-input addMenu" type="checkbox" value=""
                                            id="linkCheck">
                                        <label class="form-check-label" for="linkCheck">
                                            {{ $link->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary btnAddMenu disabled" href="#"
                                        role="button"><i class="fa-solid fa-plus fa-sm"></i> Add to Menu</a>
                                    <a id="btn-submenu-link" data-bs-toggle="modal" data-bs-target="#modal-submenu"
                                        class="btn btn-sm btn-info btnAddSubMenu disabled" href="#"
                                        role="button"><i class="fa-solid fa-plus fa-sm"></i> Add
                                        to Submenu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-submenu" tabindex="-1" aria-labelledby="modalSubMenu"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSubMenu">Pilih Parent Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                <select class="select-submenu" name="parent_menu">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="fa-solid fa-ban"></i> Batal</button>
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                                Tambahkan</button>
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
                    @foreach ($menus as $menu)
                        @if ($loop->first)
                            <div class="accordion-item fixed" data-id="{{ $menu->id }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button bg-warning text-dark no-child rounded-0"
                                        type="button">
                                        <i class="fa-solid fa-house-chimney fa-lg pe-2"></i>{{ $menu->title }}
                                    </button>
                                </h2>
                            </div>
                        @else
                            <div class="accordion-item" data-id="{{ $menu->id }}">
                                <h2 class="accordion-header">
                                    <button
                                        class="accordion-button collapsed bg-warning text-dark rounded-0 @if (!$menu->parent_id) no-child @endif"
                                        type="button" data-bs-toggle="collapse"
                                        @if ($menu->parent_id) data-bs-target="#menu-{{ $menu->id }}" aria-expanded="true" @endif>
                                        <i class="iconMenu fa-solid fa-bars fa-lg pe-2"></i><span
                                            id="judulmenu-{{ $menu->id }}">{{ $menu->title }}</span>
                                    </button>
                                </h2>
                                <div id="menu-{{ $menu->id }}" class="accordion-collapse collapse">
                                    <div class="accordion-body py-4">
                                        @if ($menu->parent_id)
                                            <div class="accordion child">
                                                <div class="accordion-item"
                                                    data-id="{{ $menu->parent_id }}-{{ $menu->id }}">
                                                    <h2 class="accordion-header">
                                                        <button
                                                            class="accordion-button collapsed bg-info text-dark no-child rounded-0"
                                                            type="button" data-bs-toggle="collapse"
                                                            @if ($menu->parent_id) data-bs-target="#menu-{{ $menu->id }}" aria-expanded="true" @endif>
                                                            <i class="iconMenu fa-solid fa-bars fa-lg pe-2"></i><span
                                                                id="judulmenu-{{ $menu->id }}">{{ $menu->title }}</span>
                                                        </button>
                                                    </h2>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="accordion child">
                                            <div class="accordion-item"
                                                data-id="{{ $menu->parent_id }}-{{ $menu->id }}">
                                                <h2 class="accordion-header">
                                                    <button
                                                        class="accordion-button collapsed bg-info text-dark no-child rounded-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        @if ($menu->parent_id) data-bs-target="#menu-{{ $menu->id }}" aria-expanded="true" @endif>
                                                        <i class="iconMenu fa-solid fa-bars fa-lg pe-2"></i><span
                                                            id="judulmenu-{{ $menu->id }}">{{ $menu->title }}</span>
                                                    </button>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-4">
                <a id="btnUrutMenu" class="btn btn-primary" href="#" role="button"><i id="iconUrut"
                        class="fa-solid fa-arrow-down-short-wide"></i> <span id="textUrut">Urutkan Menu</span></a>
            </div>
        </div>
    @endsection

    @section('extra_js')
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
            integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                var parents = [].slice.call(document.querySelectorAll(".parent"));
                var parentSortableInstances = [];

                for (var i = 0; i < parents.length; i++) {
                    var parentSortableInstance = new Sortable(parents[i], {
                        group: "parent",
                        filter: ".fixed",
                        onMove: function(e) {
                            return e.related.className.indexOf("fixed") === -1;
                        },
                        animation: 200,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        disabled: true,
                        onUpdate: function() {
                            console.log(parentSortableInstance.toArray());
                        }
                    });
                    parentSortableInstances.push(parentSortableInstance);
                }

                var children = [].slice.call(document.querySelectorAll(".child"));
                var childSortableInstances = [];

                for (var i = 0; i < children.length; i++) {
                    var childSortableInstance = new Sortable(children[i], {
                        group: "child",
                        animation: 200,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        disabled: true,
                        onUpdate: function() {
                            console.log(childSortableInstance.toArray());
                        }
                    });
                    childSortableInstances.push(childSortableInstance);
                }

                $('#btnUrutMenu').on('click', function() {
                    $(this).toggleClass('btn-primary btn-success')
                    if ($('#textUrut').text() == 'Urutkan Menu') {
                        $('#textUrut').text('Simpan Urutan');
                    } else {
                        $('#textUrut').text('Urutkan Menu');
                    }
                    $('#iconUrut').toggleClass('fa-solid fa-arrow-down-short-wide fa-solid fa-floppy-disk')
                    $('.iconMenu').toggleClass('fa-solid fa-bars fa-solid fa-up-down-left-right')
                    if ($('#textUrut').text() == 'Simpan Urutan') {

                        for (var i = 0; i < parentSortableInstances.length; i++) {
                            parentSortableInstances[i].option("disabled", false);
                        }
                        for (var i = 0; i < childSortableInstances.length; i++) {
                            childSortableInstances[i].option("disabled", false);
                        }
                    } else {
                        for (var i = 0; i < parentSortableInstances.length; i++) {
                            parentSortableInstances[i].option("disabled", true);
                        }
                        for (var i = 0; i < childSortableInstances.length; i++) {
                            childSortableInstances[i].option("disabled", true);
                        }
                    }
                });
            });
        </script>
        <script>
            $('.addMenu').on('change', function() {
                var anyChecked = $('.addMenu:checked').length > 0;
                if (anyChecked) {
                    $('.btnAddMenu').removeClass('disabled');
                    $('.btnAddSubMenu').removeClass('disabled');
                } else {
                    $('.btnAddMenu').addClass('disabled');
                    $('.btnAddSubMenu').addClass('disabled');
                }
            });
        </script>
        {{-- <script>
            function renameMenu(id) {
                let button = document.getElementById("labelbutton-" + id)
                button.classList.remove("d-none");
                let text = document.getElementById("labelinput-" + id).value
                document.getElementById("judulmenu-" + id).innerHTML = text
            }
        </script> --}}
        <script>
            $('.select-submenu').select2({
                theme: "bootstrap-5",
            });
        </script>
    @endsection
