<style>
    .rounded2 {
        border-radius: 10px;
    }
</style>

@php
    $promoData = [
        1 => 'Pisang Cavendish',
        2 => 'Apel Fuji, Enoki Mushroom, Pear, Tenderlion Slice, Sirloin Slice',
        3 => 'Nutella',
        4 => 'Egg Omega, Egg Daily Fresh',
        5 => 'Apel Pacific Rose, Queen, Apel Royal Gala',
        6 => 'Beef Tenderloin, Beef Shortplate',
    ];

    $promoFinal = [];
    foreach ($promoData as $id => $nama) {
        $path = 'img/promo/items/jsm' . $id;
        foreach (['.jpg', '.jpeg', '.png'] as $ext) {
            if (file_exists(public_path($path . $ext))) {
                $promoFinal[] = [
                    'id' => $id,
                    'nama' => $nama,
                    'gambar' => asset($path . $ext)
                ];
                break;
            }
        }
    }
@endphp

<div class="container-fluid pt-0 my-3 px-0">
    <div class="text-center mx-auto mt-2" style="max-width: 600px">
        <h1 class="display-5 mb-4">Promosi <span class="text-primary">{{ date('F') }}</span></h1>
    </div>
    <div class="owl-carousel project-carousel">
        @foreach ($promoFinal as $promo)
            @php
                $url = ($promo['id'] === 1)
                    ? url('/layar?produk=' . urlencode($promo['nama'])) 
                    : url('/layar?produk=' . urlencode($promo['nama']) . '&img=' . urlencode($promo['gambar']));
            @endphp
            <a class="project-item pb-4 px-3" href="{{ $url }}" target="_blank">
                <img class="img-fluid rounded2" src="{{ $promo['gambar'] }}" alt="Promo {{ $promo['nama'] }}" />
                <div class="project-title">
                    <button class="btn btn-light rounded-4 text-primary lead">
                        Beli Sekarang <i class="bi bi-cart" style="color: rgb(0,180,0)"></i>
                    </button>
                </div>
            </a>
        @endforeach
    </div>
</div>
