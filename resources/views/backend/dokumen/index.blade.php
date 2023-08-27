@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Dokumen</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col">
            <a href="{{ route('dashboard.dokumen.create') }}" class="btn btn-success"><i
                    class="fa-solid fa-circle-plus"></i>
                Tambah</a>
        </div>

        <div class="mt-4">
            <table id="documentTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Judul Dokumen</th>
                        <th class="col">Tanggal Diupload</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($documents->count() > 0)
                        @foreach ($documents as $document)
                            @php $tanggal = Carbon\Carbon::parse($document->created_at) @endphp
                            <tr>
                                <td class="col">{{ $document->title }}</td>
                                <td class="col">
                                    {{ $tanggal->translatedFormat('l, j F Y') }}<br>
                                    ({{ $tanggal->diffForHumans() }})
                                </td>
                                <td class="col">
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('dashboard.dokumen.edit', $document->id) }}" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form id="document-{{ $document->id }}"
                                        class="d-inline"action="{{ route('dashboard.dokumen.delete', $document->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button id="confirmDelete-{{ $document->id }}" data-id={{ $document->id }}
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
            $('#documentTable').DataTable();
            $('.confirmDelete').click(function(e) {
                let id = $(this).data('id');
                let formdocument = $('#document-' + id);
                console.log(formdocument);
                Swal.fire({
                    title: 'Hapus dokumen?',
                    text: "Apakah anda yakin akan menghapus dokumen ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<i class="fa-solid fa-trash-can" ></i> Ya, Hapus saja',
                    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        formdocument.submit();
                    }
                })
            });
        });
    </script>
@endsection
