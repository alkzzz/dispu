@extends('layouts.frontend.layout')

@section('title') Kuesioner Survei Kepuasan Masyarakat @endsection

@section('extra_css')
@endsection

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h3 class="my-auto">Kuesioner Survei Kepuasan Masyarakat</h3>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href={{ route('kuesioner.index') }}"
                        class="text-dark">Kuesioner</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container my-4">
        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <form method="post" action="{{ route('kuesioner.store') }}">
            @csrf
            <div class="fw-bold">I. PROFIL</div>
            {{-- <div class="mb-3">
                <div class="fw-semibold small">Nama</div>
                <input type="text" class="form-control" placeholder="Nama Anda" name="nama" required>
            </div> --}}
            <div class="mb-3">
                <div class="fw-semibold small">Jenis Kelamin</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" value="Laki-Laki" name="sex" required>
                    <label class="form-check-label" for="male">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" value="Perempuan" name="sex" required>
                    <label class="form-check-label" for="female">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="fw-semibold small">Pendidikan</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-1" value="SD" name="education" required>
                    <label class="form-check-label" for="education-1">SD</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-2" value="SMP" name="education" required>
                    <label class="form-check-label" for="education-2">SMP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-3" value="SMA" name="education" required>
                    <label class="form-check-label" for="education-3">SMA</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-4" value="Diploma" name="education" required>
                    <label class="form-check-label" for="education-4">Diploma</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-5" value="S1" name="education" required>
                    <label class="form-check-label" for="education-5">S1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="education-6" value="S2" name="education" required>
                    <label class="form-check-label" for="education-6">S2 Ke-Atas</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="fw-semibold small">Pekerjaan</div>
                <input type="text" class="form-control" placeholder="Swasta" name="job" list="jobs" required>
                <datalist id="jobs">
                    <option value="PNS">
                    <option value="TNI">
                    <option value="POLRI">
                    <option value="SWASTA">
                    <option value="WIRAUSAHA">
                    <option value="PELAJAR/MAHASISWA">
                </datalist>
            </div>
            <div class="mb-3">
                <div class="fw-semibold small">Jenis Layanan yang diterima</div>
                <input type="text" class="form-control" placeholder="KTP, Akta" name="received_services" required>
                <div class="form-text ">
                    <span class="small">Misal: KTP, Akta, Sertifikat, Poli Umum, dll</span>
                </div>
            </div>
            <div class="fw-bold mt-5">II. PENDAPAT RESPONDEN TENTANG LAYANAN</div>
            @foreach ($questions as $question)
            <div class="mb-3">
                <div class="fw-semibold small">{{ $loop->iteration }}. {{ $question->name }}</div>
                @foreach ($question->answers as $answer)
                <div class="ms-3 form-check">
                    <input class="form-check-input" type="radio" id="{{ $question->id }}-answer-{{ $answer->id }}" value="{{ $answer->id }}" name="answers[{{$question->id}}]" required>
                    <label class="form-check-label small" for="{{ $question->id }}-answer-{{ $answer->id }}">{{ $answer->name }}</label>
                </div>
                @endforeach
            </div>
            <div class="mb-3">
                <div class="fw-semibold small">Saran Perbaikan dan/atau Apresiasi</div>
                <textarea rows="4" class="form-control" name="opinion"></textarea>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary px-4 py-2 rounded-pill"
                onclick="return confirm('Apakah anda yakin?')"
                type="submit">Kirim Respon</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_js')
@endsection
