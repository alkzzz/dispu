@extends('layouts.frontend.layout')

@section('content')
    <div class="container-flui">
        <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/1000/800?random=1" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1000/800?random=2" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1000/800?random=3" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-fluid py-3" style="background-color:#eeb432">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <p class="fs-4 fw-semibold mb-0">Pengumuman:</p>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <p class="news-rotator px-2 mb-0 fw-medium" style="font-size: 1rem">
                        Aliqua ex est ex ipsum cillum sit velit. Nostrud irure quis minim deserunt. Consequat
                        est culpa tempor ipsum ea veniam. Velit anim in consequat eu reprehenderit eiusmod et
                        irure. Ullamco incididunt magna nostrud anim voluptate nisi ullamco mollit.;

                        Nulla occaecat incididunt exercitation adipisicing Lorem consequat commodo quis. Qui
                        cillum aliquip ea ut laborum id fugiat mollit. Ad quis officia fugiat dolor et ipsum et
                        ipsum tempor ut. Qui laborum occaecat irure commodo dolor esse excepteur sunt nostrud
                        reprehenderit sit exercitation.;

                        Non ex irure ad cillum consectetur voluptate duis sit laborum amet labore ut.
                        Adipisicing
                        pariatur et est reprehenderit ipsum quis tempor laborum mollit minim ad officia veniam
                        tempor.
                        Est dolore elit culpa consectetur ut veniam.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card text-center bg-light bg-gradient">
            <div class="card-header mt-2">
                <h3>Media Sosial</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
