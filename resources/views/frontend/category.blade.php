@extends('layouts.frontend.layout')

@section('title', $category->title)

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper($category->title) }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url($category->slug) }}"
                        class="text-dark">{{ $category->title }}</a>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 3rem">Berita {{ $category->title }}</h2>
        @foreach ($posts as $post)
            @if ($loop->index % 2)
                <div class="row">
                    <div class="col-8">
                        <h3>{{ $post->title }}</h3>
                        <p class="fs-5" style="text-align: justify">{{ \Str::words($post->content, 130) }}
                        </p>
                        <a class="btn btn-primary" href="{{ route('frontend.getPost', $post->slug) }}" role="button">Read
                            More <i class="fa-solid fa-angles-right"></i></a>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-1 mb-3 bg-white rounded">
                            <img class="img-fluid" src="https://picsum.photos/500?random=1" alt="" srcset="">
                            <div class="card-img-overlay"></div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
            @else
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow p-1 mb-3 bg-white rounded">
                            <img class="img-fluid" src="https://picsum.photos/500?random=2" alt="" srcset="">
                            <div class="card-img-overlay"></div>
                        </div>
                    </div>
                    <div class="col-8">
                        <h3>{{ $post->title }}</h3>
                        <p class="fs-5" style="text-align: justify">{{ \Str::words($post->content, 130) }}
                        </p>
                        <a name="" id="" class="btn btn-primary"
                            href="{{ route('frontend.getPost', $post->slug) }}" role="button">Read More <i
                                class="fa-solid fa-angles-right"></i>
                        </a>
                    </div>
                </div>
                <hr class="mb-4">
            @endif
        @endforeach
        <div class="row mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
