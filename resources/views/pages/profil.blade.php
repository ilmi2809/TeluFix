@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="profile-card">
        <div class="text-center">
            @if(auth()->user() && auth()->user()->foto)
                <img src="{{ asset('storage/assets/images/' . auth()->user()->foto) }}" alt="Profile" class="profile-image">
            @else
                <!-- Tampilkan gambar default jika tidak ada foto -->
                <img src="{{ auth()->user()->foto }}" alt="Default Profile" class="profile-image">
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="info-row d-flex">
            <div class="info-label">Nama</div>
            <div>{{ auth()->user()->name }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">NIM</div>
            <div>{{ auth()->user()->nim }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Jurusan</div>
            <div>{{ auth()->user()->jurusan }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Status</div>
            <div>{{ auth()->user()->role }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Email</div>
            <div>{{ auth()->user()->email }}</div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
