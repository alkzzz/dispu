@extends('layouts.backend.layout')

@section('title', 'Kontak')

@section('extra_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Edit Informasi Kontak</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4">
            <form action="{{ route('kontak.update', $contact->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" rows="2" name="address" required>{{ $contact->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone-number" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="phone-number" name="phone_number" value="{{ $contact->phone_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="working-hours" class="form-label">Jam Kerja</label>
                        <textarea class="form-control" id="working-hours" rows="3" name="working_hours" required>{{ $contact->working_hours }}</textarea>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('extra_js')
{{-- Summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#working-hours').summernote({
            toolbar: [
                ['font', ['bold', 'underline', 'italic']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['insert', ['link', 'picture', 'video']],
            ],
        });
    })
</script>
@endsection
