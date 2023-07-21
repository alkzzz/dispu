@extends('layouts.frontend.layout')

@section('title', 'Berita')

@section('header-title')
    <div class="container-fluid">
        <div class="row text-center text-white" style="background-color: #030f6b;height:100px">
            <h1 style="margin: auto">{{ strtoupper('Berita') }}</h1>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <div class="py-1" style="background-color:#eeb432;font-size:1.1rem">
        <nav aria-label="breadcrumb" class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('galeri') }}" class="text-dark">Berita</a></li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="pb-2 border-bottom border-2 black" style="margin-bottom: 3rem">Berita Dinas Pekerjaan Umum dan Penataan
            Ruang
            Kota Banjarbaru</h2>
        @php $color = ['warning', 'danger', 'info', 'success'] @endphp

        @foreach ($posts->chunk(2) as $postChunk)
            @foreach ($postChunk as $post)
                <div class="row">
                    @if ($loop->index % 2 == 0)
                        <div class="col-8">
                            <a class="text-decoration-none text-dark" href="{{ route('frontend.getPost', $post->slug) }}">
                                <h3>{{ $post->title }}</h3>
                            </a>
                            <p style="color:gray;font-size:0.9rem;font-weight:500"><i>
                                    <i class="fa-solid fa-calendar fa-fw"></i>
                                    {{ $post->created_at->translatedFormat('j F Y') }}
                                    ({{ $post->created_at->diffForHumans() }})
                                </i>
                            </p>
                            <p class="fs-5" style="text-align: justify">{{ \Str::words($post->content, 130) }}</p>
                            <ul class="px-0">
                                @foreach ($post->categories as $category)
                                    <a class="text-decoration-none"
                                        href="{{ route('frontend.getCategory', $category->slug) }}">
                                        <li class="fs-6 mb-1 badge badge-lg text-bg-{{ $color[$loop->index] }}"
                                            style="font-size: 0.8rem">
                                            {{ $category->title }}</li>
                                    </a>
                                @endforeach
                            </ul>
                            <a class="btn btn-primary" href="{{ route('frontend.getPost', $post->slug) }}"
                                role="button">Read More <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                        <div class="col-4">
                            <div class="card shadow p-1 mb-3 bg-white rounded">
                                <a href="{{ route('frontend.getPost', $post->slug) }}">
                                    <img class="img-fluid" src="https://picsum.photos/500?random=1" alt=""
                                        srcset="">
                                    <div class="card-img-overlay"></div>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-4">
                            <div class="card shadow p-1 mb-3 bg-white rounded">
                                <a href="{{ route('frontend.getPost', $post->slug) }}">
                                    <img class="img-fluid" src="https://picsum.photos/500?random=1" alt=""
                                        srcset="">
                                    <div class="card-img-overlay"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <a class="text-decoration-none text-dark" href="{{ route('frontend.getPost', $post->slug) }}">
                                <h3>{{ $post->title }}</h3>
                            </a>
                            <p style="color:gray;font-size:0.9rem;font-weight:500"><i>
                                    <i class="fa-solid fa-calendar fa-fw"></i>
                                    {{ $post->created_at->translatedFormat('j F Y') }}
                                    ({{ $post->created_at->diffForHumans() }})
                                </i>
                            </p>
                            <p class="fs-5" style="text-align: justify">{{ \Str::words($post->content, 130) }}</p>
                            <ul class="px-0">
                                @foreach ($post->categories as $category)
                                    <a class="text-decoration-none"
                                        href="{{ route('frontend.getCategory', $category->slug) }}">
                                        <li class="fs-6 mb-1 badge badge-lg text-bg-{{ $color[$loop->index] }}"
                                            style="font-size: 0.8rem">
                                            {{ $category->title }}</li>
                                    </a>
                                @endforeach
                            </ul>
                            <a class="btn btn-primary" href="{{ route('frontend.getPost', $post->slug) }}"
                                role="button">Read More <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    @endif
                </div>
                <hr class="mb-4">
            @endforeach
        @endforeach
        <div class="row mt-4">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
