@extends('layouts.backend.layout')

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Backup</h2>
    <div class="row mt-3">
        <div class="col-6">
            <h4>Backup Terakhir: <span class="fw-bold">{{ now()->subDays(1)->translatedFormat('j F Y') }}
                    ({{ now()->subDays(1)->diffForHumans() }})</span></h4>
            <a class="btn btn-danger btn-lg mt-2" href={{ route('dashboard.backup-download') }} role="button" download><i
                    class="fa-solid fa-download"></i> Download
                Backup</a>
        </div>
    </div>
@endsection
