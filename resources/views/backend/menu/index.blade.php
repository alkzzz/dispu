@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- Select2 BS5-theme --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

        .delete-menu-icon {
            position: absolute;
            right: 50px;
        }

        .no-child .delete-menu-icon {
            right: 20px;
        }
    </style>
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Menu</h2>
    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
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
                                <form id="formAddMenuPage" action="{{ route('dashboard.menu.store') }}" method="post">
                                    @csrf

                                    @if(!$pages->isEmpty())
                                        @foreach ($pages as $page)
                                            <div class="form-check">
                                                <input class="form-check-input addMenu" name="page_menu[]" type="checkbox"
                                                    value="{{ $page->id }}" id="pageCheck">
                                                <label class="form-check-label" for="pageCheck">
                                                    <a href="{{ $page->url }}" target="_blank"
                                                        rel="noopener noreferrer">{{ $page->title }}</a>
                                                </label>
                                                <input type="hidden" name="menu" value="1">
                                            </div>
                                        @endforeach
                                    @else
                                    <p style="font-size:0.58rem;font-style:italic;color:red">Belum ada halaman yang dibuat atau semua halaman sudah dimasukkan ke menu</p>
                                    @endif
                                </form>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a id="btnAddMenuPage" class="btn btn-sm btn-primary disabled btnAddMenu" href="#"
                                        role="button"><i class="fa-solid fa-plus fa-sm"></i> Add to Menu</a>
                                    <a data-bs-toggle="modal" data-bs-target="#modal-submenu" data-type="page"
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
                                <form id="formAddMenuCategory" action="{{ route('dashboard.menu.store') }}" method="post">
                                    @csrf
                                    @if(!$categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input addMenu" type="checkbox" name="category_menu[]"
                                                value="{{ $category->id }}" id="categoryCheck">
                                            <label class="form-check-label" for="categoryCheck">
                                                <a href="{{ $category->url }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $category->title }}</a>
                                            </label>
                                            <input type="hidden" name="menu" value="1">
                                        </div>
                                    @endforeach
                                    @else
                                    <p style="font-size:0.58rem;font-style:italic;color:red">Belum ada kategori yang dibuat atau semua kategori sudah dimasukkan ke menu</p>
                                    @endif
                                </form>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a id="btnAddMenuCategory" class="btn btn-sm btn-primary disabled btnAddMenu"
                                        href="#" role="button"><i class="fa-solid fa-plus fa-sm"></i> Add to
                                        Menu</a>
                                    <a data-bs-toggle="modal" data-bs-target="#modal-submenu" data-type="category"
                                        class="btn btn-sm btn-info disabled btnAddSubMenu" href="#"
                                        role="button"><i class="fa-solid fa-plus fa-sm"></i> Add
                                        to Submenu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingLinks">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#selectLinkMenu" aria-expanded="false"
                                aria-controls="selectLinkMenu">
                                Custom Links
                            </button>
                        </h2>
                        <div id="selectLinkMenu" class="accordion-collapse collapse" aria-labelledby="headingLinks"
                            data-bs-parent="#selectMenuItem">
                            <div class="accordion-body">
                                <form id="formAddMenuLink" action="{{ route('dashboard.menu.store') }}" method="post">
                                    @csrf
                                    @if(!$links->isEmpty())
                                    @foreach ($links as $link)
                                        <div class="form-check">
                                            <input class="form-check-input addMenu" type="checkbox" name="link_menu[]"
                                                value="{{ $link->id }}" id="linkCheck">
                                            <label class="form-check-label" for="linkCheck">
                                                <a href="{{ $link->url }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $link->title }}</a>
                                            </label>
                                            <input type="hidden" name="menu" value="1">
                                        </div>
                                    @endforeach
                                    @else
                                    <p style="font-size:0.58rem;font-style:italic;color:red">Belum ada link yang dibuat atau semua link sudah dimasukkan ke menu</p>
                                    @endif
                                </form>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a id="btnAddMenuLink" class="btn btn-sm btn-primary disabled btnAddMenu"
                                        href="#" role="button"><i class="fa-solid fa-plus fa-sm"></i> Add to
                                        Menu</a>
                                    <a data-bs-toggle="modal" data-bs-target="#modal-submenu" data-type="link"
                                        class="btn btn-sm btn-info disabled btnAddSubMenu" href="#"
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
                            <select id="parentSelect" class="select-submenu" name="parent_menu">
                                @foreach ($menus as $menu)
                                    @if ($loop->index > 2 and !$menu->parent_id)
                                        <option value="{{ $menu->id }}">{{ $menu->title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="fa-solid fa-ban"></i> Batal</button>
                            <button id="btnAddSubMenu" type="button" class="btn btn-success"><i
                                    class="fa-solid fa-plus"></i>
                                Tambahkan</button>
                        </div>
                        <form id="formAddSubMenu" action="{{ route('dashboard.menu.store') }}" method="post">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr class="d-block d-md-none mt-3 border border-primary border-1">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header bg-dark text-white fs-5">
                    Pengaturan Menu
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
                            @if (!$menu->parent_id)
                                <div class="accordion-item" data-id="{{ $menu->id }}">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed bg-warning text-dark rounded-0 @unless ($menu->has_child) no-child @endunless"
                                            type="button" data-bs-toggle="collapse"
                                            @if ($menu->has_child) data-bs-target="#menu-{{ $menu->id }}" aria-expanded="false" @endif>
                                            <i class="iconMenu fa-solid fa-bars fa-lg pe-2"></i>
                                            <span id="judulmenu-{{ $menu->id }}">{{ $menu->title }}</span>
                                            @if (strcmp($menu->title, 'Berita') and strcmp($menu->title, 'Galeri'))
                                                <i data-id={{ $menu->id }}
                                                    class="fa-regular fa-circle-xmark fa-lg delete-menu-icon"></i>
                                                <form id="deleteMenu-{{ $menu->id }}"
                                                    action="{{ route('dashboard.menu.delete', $menu->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="menu-{{ $menu->id }}" data-id="{{ $menu->id }}"
                                        class="accordion-collapse collapse">
                                        <div class="accordion-body py-4">
                                            @if ($menu->has_child)
                                                <div class="accordion child">
                                                    @foreach ($menu->child as $child)
                                                        <div class="accordion-item" data-id="{{ $child }}">
                                                            <h2 class="accordion-header">
                                                                <button
                                                                    class="accordion-button collapsed bg-info text-dark no-child rounded-0"
                                                                    type="button"
                                                                    @if ($menu->has_child) data-bs-target="#menu-{{ $child }}" aria-expanded="true" @endif>
                                                                    <i
                                                                        class="iconMenu fa-solid fa-bars fa-lg pe-2"></i><span
                                                                        @php $child = \App\Models\Menu::find($child) @endphp
                                                                        @if (isset($child)) id="judulmenu-{{ $child->id }}">
                                                                        {{ $child->title }}
                                                                    </span>
                                                                    <i data-id={{ $child->id }} data-type="submenu"
                                                                        class="fa-regular fa-circle-xmark fa-xl delete-menu-icon"></i>
                                                                        <form id="deleteSubMenu-{{ $child->id }}"
                                                                            action="{{ route('dashboard.menu.delete', $child->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form> @endif
                                                                        </button>
                                                            </h2>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-4">
                <a id="btnUrutMenu" class="btn btn-primary" href="#" role="button"><i id="iconUrut"
                        class="fa-solid fa-pen-to-square"></i> <span id="textUrut">Urutkan Menu</span></a>
            </div>
        </div>
    @endsection

    @section('extra_js')
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                            // console.log(parentSortableInstance.toArray());
                        }
                    });
                    parentSortableInstances.push(parentSortableInstance);
                }

                var children = [].slice.call(document.querySelectorAll(".child"));
                var childSortableInstances = [];
                var parent_child_order = [];

                for (var i = 0; i < children.length; i++) {
                    var childSortableInstance = new Sortable(children[i], {
                        group: "child",
                        animation: 200,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        disabled: true,
                        onUpdate: function(event) {
                            parent_id = event.to.parentNode.parentNode.getAttribute("data-id");
                            child_order = this.toArray();
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('dashboard.menu.sort') }}",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    'parent_id': parent_id,
                                    'child_order': child_order,
                                },
                                success: function(data) {
                                    // console.log(data);
                                }
                            });
                        }
                    });
                    childSortableInstances.push(childSortableInstance);
                }

                $('#btnUrutMenu').on('click', function() {
                    $(this).toggleClass('btn-primary btn-success')
                    if ($('#textUrut').text() == 'Urutkan Menu') {
                        $('#textUrut').text('Simpan Menu');
                    } else {
                        $('#textUrut').text('Urutkan Menu');
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('dashboard.menu.sort') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                'order': parentSortableInstances[0].toArray(),
                            },
                            success: function(data) {
                                // console.log(data);
                            }
                        });

                    }
                    $('#iconUrut').toggleClass('fa-solid fa-pen-to-square fa-solid fa-floppy-disk')
                    $('.iconMenu').toggleClass('fa-solid fa-bars fa-solid fa-up-down-left-right')
                    if ($('#textUrut').text() == 'Simpan Menu') {

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
            $('#btnAddMenuPage').on('click', function() {
                $('#formAddMenuPage').submit();
            });
            $('#btnAddMenuCategory').on('click', function() {
                $('#formAddMenuCategory').submit();
            });
            $('#btnAddMenuLink').on('click', function() {
                $('#formAddMenuLink').submit();
            });

            $('#modal-submenu').on('show.bs.modal', function(event) {
                var submenu = true;
                var selected = [];
                $('.addMenu:checked').each(function() {
                    selected.push($(this).val());
                })
                var type = $(event.relatedTarget).data('type');
                $('#btnAddSubMenu').on('click', function() {
                    var parent_id = $('#parentSelect').find(":selected").val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('dashboard.menu.store') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'submenu': true,
                            'selected': selected,
                            'type': type,
                            'parent_id': parent_id,
                        },
                        success: function(data) {
                            window.location.reload()
                        }
                    });
                });
            });

            $(document).delegate('.delete-menu-icon', 'mousedown', function(event) {
                var token = $("meta[name='csrf-token']").attr("content");
                var menu_id = $(this).data('id')
                var subMenu = $(this).data('type') === 'submenu';
                var formDeleteMenu = $('#deleteMenu-' + menu_id);
                var formDeleteSubMenu = $('#deleteSubMenu-' + menu_id);
                var delete_url = "{{ route('dashboard.menu.delete', ':id') }}";
                delete_url = delete_url.replace(':id', menu_id);
                var button = event.target.closest('.accordion-button');
                button.removeAttribute('data-bs-toggle');
                setTimeout(function(btn) {
                    btn.setAttribute('data-bs-toggle', 'collapse');
                }, 500, button);
                Swal.fire({
                    title: 'Hapus Menu?',
                    text: "Apakah anda yakin akan menghapus menu ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (subMenu) {
                            formDeleteSubMenu.submit();
                        } else {
                            formDeleteMenu.submit();
                        }
                    }
                });
            });
        </script>
        <script>
            $('.select-submenu').select2({
                theme: "bootstrap-5",
            });
        </script>
    @endsection
