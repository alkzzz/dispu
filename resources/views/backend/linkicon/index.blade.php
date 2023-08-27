@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Link Icon</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.link-icon.create') }}" class="btn btn-success"><i
                    class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="link-iconTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-4">Judul Link</th>
                        <th class="col-4">Alamat URL</th>
                        <th class="col-2">Icon</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($linkicons->count() > 0)
                        @foreach ($linkicons as $linkicon)
                            <tr>
                                <td class="col">{{ $linkicon->title }}</td>
                                <td class="col">{{ $linkicon->url }}</td>
                                <td class="col">
                                    <a href="@if ($linkicon->getFirstMediaUrl('link-icon', 'large')) {{ $linkicon->getFirstMediaUrl('link-icon', 'large') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        data-title="{{ $linkicon->title }}" data-lightbox="link-icon">
                                        <img style="width: 128px;height:72px"
                                            src="@if ($linkicon->getFirstMediaUrl('link-icon', 'preview')) {{ $linkicon->getFirstMediaUrl('link-icon', 'preview') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                            class="img-thumbnail" alt="thumbnail">
                                    </a>
                                </td>
                                <td class="col">
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('dashboard.link-icon.edit', $linkicon->id) }}" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @role('Super Admin')
                                        <form id="link-icon-{{ $linkicon->id }}"
                                            class="d-inline"action="{{ route('dashboard.link-icon.delete', $linkicon->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="confirmDelete-{{ $linkicon->id }}" data-id={{ $linkicon->id }}
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
            $('#link-iconTable').DataTable({
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
                let formlinkicon = $('#link-icon-' + id);
                Swal.fire({
                    title: 'Hapus Link Icon?',
                    text: "Apakah anda yakin akan menghapus link icon ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formlinkicon.submit();
                    }
                })
            });
        });
    </script>
@endsection
