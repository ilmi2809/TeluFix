@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="profile-card">
        <div class="text-center">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Profile" class="profile-image">
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Nama</div>
            <div>{{ auth()->user()->name }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Status</div>
            <div>Mahasiswa</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">NIM</div>
            <div>{{ auth()->user()->nim ?? '1202220122' }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Email</div>
            <div>{{ auth()->user()->email }}</div>
        </div>

        <div class="info-row d-flex">
            <div class="info-label">Jurusan</div>
            <div>{{ auth()->user()->jurusan ?? 'S1 Sistem Informasi' }}</div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="save-btn">Logout</button>
        </form>
    </div>
</div>
@endsection
