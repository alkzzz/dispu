@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- Select2 BS5-theme --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Tambah Galeri</h2>

    <div class="row mt-3">
        <!-- Display success messages -->
        @if (session()->has('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form action="{{ route('dashboard.galeri.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Galeri</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required>
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="locationSelect">Pilih Lokasi Kecamatan
                        <select id="locationSelect" name="location" style="width: 100%">
                            @php $banjarbaru = ['Banjarbaru Selatan', 'Banjarbaru Utara', 'Cempaka', 'Landasan Ulin', 'Liang Anggang']; @endphp
                            @foreach ($banjarbaru as $kec)
                                <option value="{{ $kec }}">{{ $kec }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="mb-3">
                    <label for="Image" class="form-label">Upload Gambar</label>
                    <input name="gambar" class="form-control" type="file" id="formFile" onchange="preview()">
                    <img style="width:300px;height:300px" id="frame" src="{{ asset('img/no-image.jpg') }}"
                        class="img-fluid mt-3" />
                    <a class="btn btn-sm btn-warning align-top mt-3 ms-2" href="#frame" onclick="clearImage()"><i
                            class="fa-solid fa-ban"></i> Hapus Gambar</a>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                <a class="btn btn-danger" href="{{ route('dashboard.galeri.index') }}" role="button"><i
                        class="fa-solid fa-ban"></i> Cancel</a>
            </div>
        </form>
    </div>
@endsection

@section('extra_js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#locationSelect').select2({
                theme: "bootstrap-5",
                width: 'resolve'
            });
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
