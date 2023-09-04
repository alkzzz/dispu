@extends('layouts.backend.layout')

@section('extra_css')
    {{-- Summernote --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
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
    <h2 class="pb-2 border-bottom border-dark">Edit Bidang</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form action="{{ route('dashboard.bidang.update', $bidang->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mt-2">
                <div class="mb-3">
                    <label for="title" class="form-label">Nama Bidang</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $bidang->title }}"
                        required>
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{!! $bidang->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="Image" class="form-label">Upload Gambar</label>
                    <input name="gambar" class="form-control" type="file" id="formFile" onchange="preview()">
                    <img style="width:300px;height:300px" id="frame"
                        src="@if ($bidang->getFirstMediaUrl('bidang')) {{ $bidang->getFirstMediaUrl('bidang') }}
                    @else
                    {{ asset('img/no-image.jpg') }} @endif"
                        class="img-fluid mt-3" />
                    <a class="btn btn-sm btn-warning align-top mt-3 ms-2" href="#frame" onclick="clearImage()"><i
                            class="fa-solid fa-ban"></i> Hapus Gambar</a>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                <a class="btn btn-danger" href="{{ route('dashboard.bidang') }}" role="button"><i
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
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
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
            $('#btnHapusGambar').removeClass('d-none');
        }

        function clearImage() {
            document.getElementById('formFile').value = null;
            frame.src = "{{ asset('img/no-image.jpg') }}";
        }
    </script>
@endsection
