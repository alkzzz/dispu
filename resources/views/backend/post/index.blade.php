@extends('layouts.backend.layout')

@section('additional_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Berita</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.berita.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="postTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Judul Berita</th>
                        <th class="col">Tanggal</th>
                        <th class="col">Kategori</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td class="col">{{ $post->title }}</td>
                            <td class="col">{{ $post->created_at->translatedFormat('l, j F Y') }}<br>
                                ({{ $post->created_at->diffForHumans() }})
                            </td>
                            <td class="col">
                                <ul style="list-style-type:none;padding:0;margin:0">
                                    @php $color = ['primary', 'warning', 'danger', 'info', 'success'] @endphp
                                    @foreach ($post->categories as $category)
                                        <li class="d-block mb-1 badge text-bg-{{ $color[$loop->index] }}"
                                            style="font-size: 0.8rem">
                                            {{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="col">
                                <a class="btn btn-info btn-sm" href="{{ route('dashboard.berita.show', $post->id) }}"
                                    role="button"><i class="fa-solid fa-eye"></i>
                                    Show</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('dashboard.berita.edit', $post->id) }}"
                                    role="button"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form id="post-{{ $post->id }}"
                                    class="d-inline"action="{{ route('dashboard.berita.delete', $post->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button id="confirmDelete-{{ $post->id }}" data-id={{ $post->id }}
                                        class="btn btn-danger btn-sm confirmDelete" type="button"><i
                                            class="fa-solid fa-trash-can"></i>
                                        Delete</button>
                                </form>
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
            $('.confirmDelete').click(function(e) {
                let id = $(this).data('id');
                let formPost = $('#post-' + id);
                console.log(formPost);
                Swal.fire({
                    title: 'Hapus Berita?',
                    text: "Apakah anda yakin akan menghapus berita ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formPost.submit();
                    }
                })
            });
        });
    </script>
@endsection
