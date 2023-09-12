@extends('layouts.frontend.layout')

@section('title', 'Kontak Kami')

@section('extra_css')
    <style>
        .blue-icon {
            color: #007bff;
        }

        .contact-card {
            border-radius: 10px;
            transition: all 0.3s;
        }

        .contact-card:hover {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
/*
        .contact-form button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        } */
    </style>
@endsection

@section('header-title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <div class="container my-5">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="pb-2 border-bottom">Kontak Kami</h2>

        <!-- Contact Info & Form Row -->
        <div class="row mt-4">
            <!-- Contact Info Column -->
            <div class="col-md-6 mb-4">
                <div class="mb-3">
                    <h5><i class="fas fa-map-marker-alt blue-icon me-2"></i>Alamat</h5>
                    <p class="small">{{ $contact->address }}</p>
                </div>

                <div class="mb-3">
                    <h5><i class="fas fa-envelope blue-icon me-2"></i>Email</h5>
                    <p class="small">{{ $contact->email }}</p>
                </div>

                <div class="mb-3">
                    <h5><i class="fas fa-phone blue-icon me-2"></i>Telepon</h5>
                    <p class="small">{{ $contact->phone_number }}</p>
                </div>

                <div>
                    <h5><i class="fas fa-clock blue-icon me-2"></i>Jam Kerja</h5>
                    <p class="small">{!! $contact->working_hours !!}</p>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4>Kotak Saran</h4>
                    <form method="post" action="{{ route('frontend.kirim.saran') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Anda" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <textarea rows="4" class="form-control" placeholder="Saran Anda..." name="isi"></textarea>
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-primary px-4 py-2 rounded-pill" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
