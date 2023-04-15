@extends('layouts.backend.layout')

@section('additional_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Berita</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.berita.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="postTable" class="table table-secondary table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-9">Judul Berita</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td class="col-9">{{ $post->title }}</td>
                            <td class="col-3">
                                <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i> Show</button>
                                <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i>
                                    Edit</button>
                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada berita yang dibuat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('additional_js')
    {{-- DataTables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#postTable').DataTable();
        });
    </script>
@endsection
