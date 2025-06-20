    @extends('main.master1_layout')

    @section('konten')
        <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
        <script src="{{ asset('js/auth/dashboard.js') }}"></script>

        <header class="py-3 px-4 mb-0"
            style="
        background: linear-gradient(90deg, #4a90e2, #357abd);
        color: white;
        border-bottom: 3px solid #1661e2;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    ">
            <h1 class="m-0" style="font-weight: 700; font-size: clamp(1.8rem, 4vw, 2.8rem); letter-spacing: 0.05em;">
                MPANEL DASHBOARD
            </h1>
        </header>

        <div class="container-fluid mt-0">
            <div class="row">
                {{-- Sidebar --}}
                <nav class="col-md-3 sidebar d-flex flex-column justify-content-between">
                    <div>
                        <a id="link-dashboard" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <a id="link-banner"><i class="bi bi-image"></i> Banner</a>
                        <a id="link-promo"><i class="bi bi-megaphone-fill"></i> Promosi</a>
                        <a id="link-message" class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill"></i> Message
                            @if ($unreadCount > 0)
                                <span class="badge-message">{{ $unreadCount }}</span>
                            @endif
                        </a>

                    </div>

                    <div class="w-100">
                        <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
                            @csrf
                            <button class="btn btn-outline-light w-100" type="submit">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </nav>

                {{-- Konten --}}
                <main class="col-md-9 p-4">
                    {{-- Dashboard Welcome --}}
                    <section id="dashboard" class="card-section">
                        {{-- Header Selamat Datang --}}
                        <div class="p-4 mb-5 rounded-3 text-center text-white"
                            style="background: linear-gradient(135deg, #4a90e2, #357abd); box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <h3>Selamat Datang, ADMIN!</h3>
                            <p class="fs-5">Gunakan menu di sebelah kiri untuk mengelola data website Anda.</p>
                        </div>

                        {{-- Statistik Ringkas --}}
                        <div class="row mb-5 text-center">
                            <div class="col-md-4">
                                <div class="card shadow-sm border-0 rounded-4 py-4" style="background:#e3f2fd;">
                                    <i class="bi bi-image fs-1 text-primary mb-2"></i>
                                    <h2>{{ $bannerCount }}</h2>
                                    <p class="mb-0 fw-semibold">Banner</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border-0 rounded-4 py-4" style="background:#e8f5e9;">
                                    <i class="bi bi-megaphone-fill fs-1 text-success mb-2"></i>
                                    <h2>{{ $promoCount }}</h2>
                                    <p class="mb-0 fw-semibold">Promosi</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border-0 rounded-4 py-4" style="background:#fff3e0;">
                                    <i class="bi bi-envelope-fill fs-1 text-warning mb-2"></i>
                                    <h2>{{ $messageCount }}</h2>
                                    <p class="mb-0 fw-semibold">Pesan Masuk</p>
                                </div>
                            </div>
                        </div>

                        {{-- Pesan Terbaru --}}
                        <div class="mb-5">
                            <h4 class="mb-3">Pesan Terbaru</h4>
                            <div class="list-group" style="max-height: 220px; overflow-y: auto;">
                                @forelse ($latestMessages as $msg)
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $msg->subject }}</h6>
                                            <small>{{ $msg->created_at->format('d M Y') }}</small>
                                        </div>
                                        <p class="mb-1 text-truncate">{{ $msg->message }}</p>
                                        <small>Dari: {{ $msg->name }} ({{ $msg->email }})</small>
                                    </a>
                                @empty
                                    <div class="text-center text-muted">Belum ada pesan terbaru.</div>
                                @endforelse
                            </div>
                        </div>

                        {{-- Tips Singkat --}}
                        <div class="alert alert-info rounded-4 shadow-sm">
                            <h5>Tips Penggunaan</h5>
                            <ul class="mb-0">
                                <li>Selalu perbarui banner dan promosi untuk menjaga tampilan website tetap segar.</li>
                                <li>Periksa pesan masuk secara rutin agar tidak ada yang terlewat.</li>
                                <li>Gunakan menu di sebelah kiri untuk akses cepat.</li>
                            </ul>
                        </div>
                    </section>


                    {{-- Banner Upload --}}
                    <section id="banner" class="card-section d-none">
                        <h4 class="mb-3">Upload Banner</h4>
                        <form action="{{ route('admin.banner.upload') }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            @for ($i = 1; $i <= 3; $i++)
                                <div class="col-md-4">
                                    <label for="banner{{ $i }}" class="form-label">Banner
                                        {{ $i }}</label>
                                    <input type="file" name="banner{{ $i }}" id="banner{{ $i }}"
                                        class="form-control @error('banner' . $i) is-invalid @enderror" required>
                                    @error('banner' . $i)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endfor
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-gradient-primary px-4">Upload Banner</button>
                            </div>
                        </form>
                    </section>

                    {{-- Promosi Upload --}}
                    <section id="promo" class="card-section d-none">
                        <h4 class="mb-3">Upload Promosi</h4>
                        <form action="{{ route('admin.promo.upload') }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            @for ($i = 1; $i <= 3; $i++)
                                <div class="col-md-4">
                                    <label for="promo{{ $i }}" class="form-label">Promosi
                                        {{ $i }}</label>
                                    <input type="file" name="promo{{ $i }}" id="promo{{ $i }}"
                                        class="form-control @error('promo' . $i) is-invalid @enderror" required>
                                    @error('promo' . $i)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endfor
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-gradient-success px-4">Upload Promosi</button>
                            </div>
                        </form>
                    </section>

                    {{-- Message List --}}
                    <section id="message" class="card-section d-none">
                        <h4 class="mb-3">List Pesan Masuk</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $i => $msg)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $msg->name }}</td>
                                            <td>{{ $msg->email }}</td>
                                            <td>{{ $msg->subject }}</td>
                                            <td>{{ $msg->message }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada pesan masuk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>

        {{-- Footer melebar penuh di bawah container utama --}}
        <footer class="bg-dark text-white text-center py-3" style="border-top: 3px solid #2a5298;">
            &copy; {{ date('Y') }} ATEP
        </footer>
    @endsection
