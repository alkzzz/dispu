@extends('layouts.frontend.layout')

@section('title', $page->title)

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper($page->title) }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url($page->slug) }}" class="text-dark">{{ $page->title }}</a>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 3rem">{{ $page->title }}</h2>
        <div class="row">
            <div style="text-align: justify">{!! $page->content !!}</div>
        </div>
    </div>
@endsection
