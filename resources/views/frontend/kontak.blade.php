@extends('layouts.frontend.layout')

@section('title', 'Kontak Kami')

@section('extra_css')
    <style>
        .blue-icon {
        color: #007bff;
        }
    </style>
@endsection

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper('Kontak') }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('kontak') }}" class="text-dark">Kontak</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 2rem">Kontak Kami</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-map-marker-alt blue-icon"></i> Alamat</h5>
                        <p class="card-text">Jl. Mitra Praja No.9 Banjarbaru</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-envelope blue-icon"></i> Email</h5>
                        <p class="card-text">admin@dispupr.banjarbarukota.go.id</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-phone blue-icon"></i> Telepon</h5>
                        <p class="card-text">(0511) 5931688</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clock blue-icon"></i> Jam Kerja</h5>
                        <p class="card-text">Senin - Kamis: 08.00 - 16.30 WITA <br>Jum'at: 09.00 - 16.30 WITA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div style="position: relative; overflow: hidden; padding-top: 56.25%;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31860.240441941136!2d114.80843005366125!3d-3.463692138653264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681cc99b0a255%3A0x953f3f7bf07a4696!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang%20Kota%20Banjarbaru!5e0!3m2!1sen!2sid!4v1681030290577!5m2!1sen!2sid"
                        style="border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
