@extends('layouts.backend.layout')

@section('additional_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
    <h2 class="pb-2 border-bottom border-dark">Tambah Berita</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="mt-2">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="email" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
    </script>
@endsection
