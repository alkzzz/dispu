@extends('layouts.frontend.layout')

@section('title', 'Konsultasi Jasa Konstruksi')

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper('Konsultasi Jasa Konstruksi') }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('konsultasi-jasa-konstruksi') }}"
                        class="text-dark">Konsultasi Jasa
                        Konstruksi</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 2rem">Konsultasi Jasa Konstruksi (Chatting)</h2>
        <div class="row">
            <div id="chat" class="col-6">
                <iframe align="center" frameborder="yes" height="700px" name="frame1" scrolling="auto"
                    src="https://tawk.to/chat/5daef330df22d91339a06d1d/default" style="border: 1px solid;"
                    width="1080px"></iframe>
            </div>
        </div>
    </div>
@endsection
