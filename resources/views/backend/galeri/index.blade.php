@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Galeri</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.galeri.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="galeriTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Judul Galeri</th>
                        <th class="col">Lokasi Kegiatan</th>
                        <th class="col">Gambar</th>
                        <th class="col">Tanggal Dibuat</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($galleries->count() > 0)
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td class="col">{{ $gallery->title }}</td>
                                <td class="col">{{ $gallery->location }}</td>
                                <td class="col">
                                    <a href="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        data-title="{{ $gallery->title }}" data-lightbox="galeri">
                                        <img style="width: 128px;height:72px"
                                            src="@if ($gallery->getFirstMediaUrl('galeri', 'preview')) {{ $gallery->getFirstMediaUrl('galeri', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                            class="img-thumbnail" alt="thumbnail">
                                    </a>
                                </td>
                                <td class="col date-column" data-order="{{ $gallery->created_at }}">
                                    {{ $gallery->created_at->translatedFormat('l, j F Y') }}<br>
                                    ({{ $gallery->created_at->diffForHumans() }})
                                </td>
                                <td class="col">
                                    <a class="btn btn-info btn-sm"
                                        href="@if ($gallery->getFirstMediaUrl('galeri', 'large')) {{ $gallery->getFirstMediaUrl('galeri', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        data-title="{{ $gallery->title }}" data-lightbox="galeri" role="button"><i
                                            class="fa-solid fa-eye"></i>
                                        Show</a>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('dashboard.galeri.edit', $gallery->id) }}" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @role('Super Admin')
                                        <form id="galeri-{{ $gallery->id }}"
                                            class="d-inline"action="{{ route('dashboard.galeri.delete', $gallery->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="confirmDelete-{{ $gallery->id }}" data-id={{ $gallery->id }}
                                                class="btn btn-danger btn-sm confirmDelete" type="button"><i
                                                    class="fa-solid fa-trash-can"></i>
                                                Delete</button>
                                        </form>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('extra_js')
    {{-- DataTables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('lightbox/js/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            'maxWidth': 1280,
            'fitImagesInViewport': true,
            'wrapAround': true
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#galeriTable').DataTable({
                columnDefs: [{
                    targets: 'date-column',
                    type: 'date',
                }],
                order: [
                    [2, 'desc']
                ]
            });
            $('.confirmDelete').click(function(e) {
                let id = $(this).data('id');
                let formgaleri = $('#galeri-' + id);
                console.log(formgaleri);
                Swal.fire({
                    title: 'Hapus galeri?',
                    text: "Apakah anda yakin akan menghapus galeri ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formgaleri.submit();
                    }
                })
            });
        });
    </script>
@endsection
