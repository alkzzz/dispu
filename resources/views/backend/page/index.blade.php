@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Halaman Statis</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.halaman.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="pageTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Judul Halaman</th>
                        <th class="col">Tanggal Dibuat</th>
                        <th class="col">Terakhir Diupdate</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                        <tr>
                            <td class="col">{{ $page->title }}</td>
                            <td class="col">{{ $page->created_at->translatedFormat('l, j F Y') }}<br>
                                ({{ $page->created_at->diffForHumans() }})
                            </td>
                            <td class="col">{{ $page->created_at->translatedFormat('l, j F Y') }}<br>
                                ({{ $page->updated_at->diffForHumans() }})
                            </td>
                            <td class="col">
                                <a class="btn btn-info btn-sm" href="{{ route('dashboard.halaman.show', $page->id) }}"
                                    role="button"><i class="fa-solid fa-eye"></i>
                                    Show</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('dashboard.halaman.edit', $page->id) }}"
                                    role="button"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form id="page-{{ $page->id }}"
                                    class="d-inline"action="{{ route('dashboard.halaman.delete', $page->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button id="confirmDelete-{{ $page->id }}" data-id={{ $page->id }}
                                        class="btn btn-danger btn-sm confirmDelete" type="button"><i
                                            class="fa-solid fa-trash-can"></i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada halaman yang dibuat.</td>
                        </tr>
                    @endforelse
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
    <script>
        $(document).ready(function() {
            $('#pageTable').DataTable();
            $('.confirmDelete').click(function(e) {
                let id = $(this).data('id');
                let formpage = $('#page-' + id);
                console.log(formpage);
                Swal.fire({
                    title: 'Hapus halaman?',
                    text: "Apakah anda yakin akan menghapus halaman ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formpage.submit();
                    }
                })
            });
        });
    </script>
@endsection
