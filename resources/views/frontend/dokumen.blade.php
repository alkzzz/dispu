@extends('layouts.frontend.layout')

@section('title', 'Dokumen')

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper('Dokumen') }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}" class="text-dark">Dokumen</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 2rem">Daftar Dokumen</h2>
        <div class="row">
            <ul class="list-group">
                @forelse ($documents as $document)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h5><i class="fa-regular fa-file-lines"></i> {{ $document->title }}</h5>
                        <div>
                            <span class="badge bg-secondary me-2">diunduh {{ $document->downloads }} kali</span>
                            <a href="{{ route('dokumen.download', $document->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-file-arrow-down"></i> Download</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">No documents available.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
