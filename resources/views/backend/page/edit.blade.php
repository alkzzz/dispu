@extends('layouts.backend.layout')

@section('extra_css')
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- Select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- Select2 BS5-theme --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <style>
        .note-editable {
            font-family: 'Arial' !important;
            font-size: 16px !important;
            text-align: left !important;
            height: 350px !important;
        }

        .note-btn.dropdown-toggle::after {
            margin-left: 0
        }
    </style>
@endsection


@section('content')
    <h2 class="pb-2 border-bottom border-dark">Tambah Halaman</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form action="{{ route('dashboard.halaman.update', $page->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Halaman</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi halaman</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{ $page->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                <a class="btn btn-danger" href="{{ route('dashboard.halaman.index') }}" role="button"><i
                        class="fa-solid fa-ban"></i> Cancel</a>
            </div>
        </form>
    </div>
@endsection

@section('extra_js')
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                toolbar: [
                    ['font', ['bold', 'underline', 'italic']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                ],
            });
            let buttons = $('.note-editor button[data-toggle="dropdown"]');
            buttons.each((key, value) => {
                $(value).on('click', function(e) {
                    $(this).attr('data-bs-toggle', 'dropdown')
                })
            })
            $('span.note-icon-caret').remove();
        });
        $('#kategori').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
