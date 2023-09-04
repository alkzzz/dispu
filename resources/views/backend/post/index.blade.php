@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Berita</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            {{-- @role('Admin Bidang') --}}
            <a href="{{ route('dashboard.berita.create') }}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>
                Tambah</a>
            {{-- @endrole --}}
        </div>
        <div class="mt-4">
            <table id="postTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col" style="max-width: 320px">Judul Berita</th>
                        <th class="col">Gambar</th>
                        <th class="col">Tampil</th>
                        <th class="col">Tanggal</th>
                        <th class="col">Kategori</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td class="col">{{ $post->title }}</td>
                                <td class="col">
                                    <img style="width: 80px;height:80px"
                                        src="@if ($post->getFirstMediaUrl('berita')) {{ $post->getFirstMediaUrl('berita') }} @else {{ asset('img/no-image.jpg') }} @endif"
                                        class="img-thumbnail" alt="thumbnail">
                                </td>
                                <td class="col text-center">
                                    @if ($post->featured)
                                        <i class="text-primary fa-regular fa-square-check fa-xl"></i>
                                    @else
                                        <i class="text-danger fa-regular fa-circle-xmark fa-xl"></i>
                                    @endif
                                </td>
                                <td class="col date-column" data-order="{{ $post->created_at }}">
                                    {{ $post->created_at->translatedFormat('l, j F Y') }}<br>
                                    ({{ $post->created_at->diffForHumans() }})
                                </td>
                                <td class="col">
                                    @php $color = ['warning', 'danger', 'info', 'success', 'primary'] @endphp
                                    <div class="text-wrap" style="max-width: 12rem;">
                                        @foreach ($post->categories as $category)
                                            <p style="font-size: 0.7rem"
                                                class="badge rounded-pill text-bg-{{ $color[$loop->index] }} my-0">
                                                {{ $category->title }}
                                            </p>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="col">
                                    <a class="btn btn-info btn-sm" href="{{ route('dashboard.berita.show', $post->id) }}"
                                        role="button"><i class="fa-solid fa-eye"></i>
                                        Show</a>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('dashboard.berita.edit', $post->id) }}" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form id="post-{{ $post->id }}" class="d-inline"
                                        action="{{ route('dashboard.berita.delete', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button id="confirmDelete-{{ $post->id }}" data-id={{ $post->id }}
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
    <script>
        $(document).ready(function() {
            $('#postTable').DataTable({
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
                let formPost = $('#post-' + id);
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
