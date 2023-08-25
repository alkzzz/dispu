@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Foto Depan</h2>
    <div class="row mt-3">
        <form action="{{ route('dashboard.gambar-depan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kepala Dinas</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $gambardepan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="Image" class="form-label">Upload Gambar</label>
                        <input name="gambar" class="form-control" type="file" id="formFile" onchange="preview()">
                        <img style="width:450px;height:450px" id="frame"
                            src="@if ($gambardepan) {{ asset($gambardepan->link) }} @else  {{ asset('img/Gambar Section 1.png') }} @endif"
                            class="img-fluid mt-3" />
                        <a class="btn btn-sm btn-warning align-top mt-3 ms-2" href="#frame" onclick="clearImage()"><i
                                class="fa-solid fa-ban"></i> Hapus Gambar</a>
                    </div>
                </div>
            </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
        <a class="btn btn-danger" href="{{ route('dashboard') }}" role="button"><i class="fa-solid fa-ban"></i> Cancel</a>
    </div>
    </form>
@endsection

@section('extra_js')
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
