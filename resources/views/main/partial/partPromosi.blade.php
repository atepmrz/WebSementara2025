<style>
    .rounded2 {
        border-radius: 10px;
    }
</style>

<!-- Promosi -->
<div class="container-fluid pt-0 my-3 px-0">
    <div class="text-center mx-auto mt-2 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px">
        <h1 class="display-5 mb-4">Promosi <span class="text-primary">{{ date('F') }}</span></h1>
    </div>

    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        @for ($x = 1; $x <= 6; $x++)
            @php
                $basePath = 'img/promo/items/jsm' . $x;
                $possibleExtensions = ['.jpg', '.jpeg'];
                $image = null;

                foreach ($possibleExtensions as $ext) {
                    $fullPath = public_path($basePath . $ext);
                    if (file_exists($fullPath)) {
                        $image = asset($basePath . $ext);
                        break;
                    }
                }
            @endphp

            @if ($image)
                <a class="project-item pb-4 px-3" href="{{ url('/layar') }}"><br>
                    <img class="img-fluid rounded2" src="{{ $image }}" alt="Promo {{ $x }}" />
                    <div class="project-title">
                        <button class="btn btn-light rounded-4 mb-0 text-primary lead">
                            Beli Sekarang <i class="bi bi-cart" style="color: rgb(0, 180, 0)"></i>
                        </button>
                    </div>
                </a>
            @endif
        @endfor
    </div>
</div>
<!-- Project End -->
