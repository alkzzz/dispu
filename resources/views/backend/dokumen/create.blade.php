@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Tambah Dokumen</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form action="{{ route('dashboard.dokumen.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Dokumen</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required>
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="fileUpload" class="form-label">Upload Dokumen</label>
                    <input class="form-control" type="file" id="fileUpload" name="dokumen" required>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                <a class="btn btn-danger" href="{{ route('dashboard.dokumen.index') }}" role="button"><i
                        class="fa-solid fa-ban"></i> Cancel</a>
            </div>
        </form>
    </div>
@endsection
