@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="history-container" style="background: transparent;box-shadow: 0 0px 0px rgba(0,0,0,0);">
            <h2>History Laporan</h2>

            <!-- Repeat this card for each history item -->
            @foreach ($reports as $item)
            <div class="history-card">
                <div class="categories-grid">
                    <div class="category-item">
                        <div class="category-label">Jenis Masalah</div>
                        <div class="category-value">{{ $item->jenis_masalah }}</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Deskripsi Masalah</div>
                        <div class="category-value">{{ $item->deskripsi }}</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Tanggal Kejadian</div>
                        <div class="category-value">{{ $item->tanggal_kejadian }}</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Waktu</div>
                        {{-- <div class="category-value">{{ $item->waktu_kejadian }}</div> --}}
                        <div class="category-value">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_kejadian)->format('H:i') }}
                        </div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Lokasi</div>
                        {{-- <div class="category-value">{{ $item->lokasi }}</div> --}}
                        <div class="category-value">
                            <a href="https://www.google.com/maps/place/{{ $item->lokasi }}"
                                target="_blank"><button class="btn btn-outline-secondary">Lihat</button></a>
                        </div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Bukti Foto/Video</div>
                        <div class="category-value">
                            <a href="{{ asset('storage/reports') . '/' . $item->gambar }}" target="_blank"><button class="btn btn-outline-secondary">Lihat</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
