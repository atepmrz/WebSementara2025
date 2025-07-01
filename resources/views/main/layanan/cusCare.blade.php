@extends('main.master_layout')
@section('konten')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-3 mb-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Customer Care</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/customerCare') }}" class="text-white">Layanan</a>
                    </li>
                </ol>
                {{-- <li class="breadcrumb-item active" aria-current="page">Customer Care</li> --}}
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
@endsection
