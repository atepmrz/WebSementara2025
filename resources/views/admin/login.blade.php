@extends('main.master1_layout')

@section('konten')

<link rel="stylesheet" href="{{ asset('css/admin/login.css') }}"> 

<div class="login-card shadow rounded">
    <h4>MPANEL</h4>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    {{-- Tambahkan pemeriksaan untuk $errors --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action="{{ route('admin.login.submit') }}" novalidate>
        @csrf
        <div class="mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                placeholder="Masukkan Email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                class="form-control" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection