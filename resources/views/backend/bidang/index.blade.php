@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Bidang</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.bidang.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="bidangTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Nama Bidang</th>
                        <th class="col">Deskripsi</th>
                        <th class="col">Foto</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($bidangs->count() > 0)
                        @foreach ($bidangs as $bidang)
                            <tr>
                                <td class="col">{{ $bidang->title }}</td>
                                <td class="col">{!! \Str::limit($bidang->description, 60) !!}</td>
                                <td class="col">
                                    <a href="@if ($bidang->getFirstMediaUrl('bidang', 'large')) {{ $bidang->getFirstMediaUrl('bidang', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        data-title="{{ $bidang->title }}" data-lightbox="bidang">
                                        <img style="width: 128px;height:72px"
                                            src="@if ($bidang->getFirstMediaUrl('bidang', 'preview')) {{ $bidang->getFirstMediaUrl('bidang', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                            class="img-thumbnail" alt="thumbnail">
                                    </a>
                                </td>
                                <td class="col">
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('dashboard.bidang.edit', $bidang->id) }}" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form id="bidang-{{ $bidang->id }}"
                                        class="d-inline"action="{{ route('dashboard.bidang.delete', $bidang->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button id="confirmDelete-{{ $bidang->id }}" data-id={{ $bidang->id }}
                                            class="btn btn-danger btn-sm confirmDelete" type="button"><i
                                                class="fa-solid fa-trash-can"></i>
                                            Delete</button>
                                    </form>
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
            $('#bidangTable').DataTable({
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
                let formbidang = $('#bidang-' + id);
                console.log(formbidang);
                Swal.fire({
                    title: 'Hapus bidang?',
                    text: "Apakah anda yakin akan menghapus bidang ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formbidang.submit();
                    }
                })
            });
        });
    </script>
@endsection
