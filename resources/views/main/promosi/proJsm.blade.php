@extends('main.master_layout')
@section('konten')
    <div class="container-fluid page-header py-2 mb-0 wow fadeIn bg-warning" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Promo JSM</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/promo-jsm') }}" class="text-white">Promosi</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="voucher" class="container-fluid">
        <!-- Info Deskripsi Promo -->
        <div class="row p-4 g-4">
            <div class="col-md">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <h4 class="mb-3">PROMO JSM (Jumat Sabtu Minggu)</h4>
                    <ul>
                        <li>🎉 Diskon spesial kebutuhan harian</li>
                        <li>🍗 Harga hemat produk segar</li>
                        <li>🧴 Promo produk rumah tangga & perawatan tubuh</li>
                        <li>🍪 Snack dan minuman favorit keluarga</li>
                        <li>📍 Kunjungi Borma Toserba terdekat</li>
                        <li>🎁 Belanja hemat, isi rumah makin lengkap!</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @php
        $jsmData = [
            1 => 'Anggur Red Globe Aussie',
            2 => 'Durian Monthong Lokal',
            3 => 'Lyche',
            4 => 'Lengkeng Bangkok Super',
            5 => 'Anggur Hijau Muscat',
            6 => 'Pear Century',
            7 => 'Semangka Baby Black, Semangka Merah',
            8 => 'Anggur Red Globe China',
            9 => 'Driscoll s blueberry import',
        ];

        $promoJSM = [];
        foreach ($jsmData as $id => $nama) {
            $base = 'img/promo/jsm/jsm' . $id;
            foreach (['.jpg', '.jpeg', '.png'] as $ext) {
                if (file_exists(public_path($base . $ext))) {
                    $promoJSM[] = [
                        'nama' => $nama,
                        'gambar' => asset($base . $ext),
                    ];
                    break;
                }
            }
        }
    @endphp

    <style>
        .rounded2 {
            border-radius: 10px;
        }
    </style>
    <div class="container-fluid pt-0 my-3 px-0">
        <div class="owl-carousel project-carousel">
            @foreach ($promoJSM as $item)
                <a class="project-item pb-4 px-3"
                    href="{{ url('/layar?produk=' . urlencode($item['nama']) . '&img=' . urlencode($item['gambar'])) }}">
                    <img class="img-fluid rounded2" src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" />
                    <div class="project-title">
                        <button class="btn btn-light rounded-4 text-primary lead">
                            Beli Sekarang <i class="bi bi-cart" style="color: rgb(0,180,0)"></i>
                        </button>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
