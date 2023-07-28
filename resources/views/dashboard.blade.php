@extends('layouts.backend.layout')

@section('content')
    <div class="container">
        <h2 class="my-4">Halaman Dashboard</h2>
        <div class="row">
            <!-- Card for Posts -->
            <div class="col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Posts</h5>
                            <p class="card-text">Click to view all Posts</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card for Pages -->
            <div class="col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Pages</h5>
                            <p class="card-text">Click to view all Pages</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card for Categories -->
            <div class="col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <p class="card-text">Click to view all Categories</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
