@extends('layouts.backend.layout')

@section('extra_css')
    {{-- Summernote --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
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
    <h2 class="pb-2 border-bottom border-dark">Tambah Berita</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form action="{{ route('dashboard.berita.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <select name="category_id[]" class="form-select" id="kategori" multiple required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"@if ($loop->first) selected @endif>
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Berita</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                </div>
                <div>
                    <p class="my-0 py-0 text-primary" style="font-size:0.8rem">Untuk meupload link Youtube harap menghapus
                        teks setelah
                        simbol &</p>
                    <p class="mb-3 text-primary" style="font-size:0.8rem">Contoh:
                        https://www.youtube.com/watch?v=ACtuNpcyJNg&ab_channel=SAJADAHHIJAU
                        menjadi
                        https://www.youtube.com/watch?v=ACtuNpcyJNg</p>
                </div>
                <div class="form-check form-switch fs-5 mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="featured" name="featured"
                        value="1">
                    <label class="form-check-label" for="featured">Tampilkan di Slider Halaman Utama
                        Website</label>
                </div>
                <div class="mb-3">
                    <label for="Image" class="form-label">Upload Gambar</label>
                    <input name="gambar" class="form-control" type="file" id="formFile" onchange="preview()">
                    <img style="width:300px;height:300px" id="frame" src="{{ asset('img/no-image.jpg') }}"
                        class="img-fluid mt-3" />
                    <a class="btn btn-sm btn-warning align-top mt-3 ms-2" href="#frame" onclick="clearImage()"><i
                            class="fa-solid fa-ban"></i> Hapus Gambar</a>
                </div>
                <hr>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <a class="btn btn-danger" href="{{ route('dashboard.berita.index') }}" role="button"><i
                            class="fa-solid fa-ban"></i> Cancel</a>
                </div>
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
            closeOnSelect: false,
            tags: true,
            allowClear: true,
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
