@extends('main.master_layout')
@section('konten')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-2 mb-0 wow fadeIn bg-primary" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Selaras</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/promo-selaras') }}" class="text-white">Promosi</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <section id="voucher" class="container-fluid">
        <div class="row p-4 g-4">
            <div class="col-md">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Promo SELARAS (SEnin SeLAsa RAbu Selalu Hemat)</h4>
                                    <span>Akhir pekan ada promo di Prama Borma dan Prama Fresh? Iya, setiap akhir pekan ada
                                        promo menarik yang super hemat di PROMO JSM (Jumat Sabtu Minggu). Belanja week end
                                        semakin seru, murah dan pas di kantong.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel -->
            <div class="col-md wow fadeInUp">
                <style>
                    .carousel-inner img {
                        max-width: 300px;
                        height: auto;
                        margin: 0 auto;
                        border-radius: 15px;
                    }

                    #promoCarousel {
                        position: relative;
                        max-width: 320px;
                        margin: 0 auto;
                    }

                    .btn-carousel {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        width: 48px;
                        height: 48px;
                        border: 2px solid #0d6efd;
                        border-radius: 50%;
                        background: transparent;
                        color: #0d6efd;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 22px;
                        cursor: pointer;
                        transition: background-color 0.3s ease, color 0.3s ease;
                        user-select: none;
                        z-index: 10;
                    }

                    .btn-carousel:hover {
                        background-color: #0d6efd;
                        color: white;
                    }

                    .btn-carousel:focus {
                        outline: none;
                        box-shadow: none;
                        transform: translateY(-50%) !important;
                    }

                    .btn-carousel.prev {
                        left: -55px;
                    }

                    .btn-carousel.next {
                        right: -55px;
                    }

                    @media (max-width: 768px) {
                        .btn-carousel {
                            width: 40px;
                            height: 40px;
                            font-size: 20px;
                            border-width: 1.5px;
                        }

                        .btn-carousel.prev {
                            left: -45px;
                        }

                        .btn-carousel.next {
                            right: -45px;
                        }
                    }
                </style>

                <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner text-center">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                <img src="{{ asset('img/promo/selaras/' . $i . '.jpg') }}"
                                    alt="Promo Selaras {{ $i }}">
                            </div>
                        @endfor
                    </div>

                    <button class="btn-carousel prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev"
                        aria-label="Previous">
                        <i class="fa fa-chevron-left"></i>
                    </button>

                    <button class="btn-carousel next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next"
                        aria-label="Next">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection






{{-- <li class="breadcrumb-item active" aria-current="page">Selaras</li> --}}
