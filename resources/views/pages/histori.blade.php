@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="history-container">
            <h2><b>History Laporan</b></h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($reports->isEmpty())
                <div class="alert alert-info">
                    Belum ada Laporan yang disubmit.
                </div>
            @else

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
                                <div class="category-value">
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_kejadian)->format('H:i') }}
                                </div>
                            </div>
                            <div class="category-item">
                                <div class="category-label">Lokasi</div>
                                <div class="category-value">
                                    <a href="https://www.google.com/maps/place/{{ $item->lokasi }}" target="_blank"><button
                                            class="btn btn-outline-secondary">Lihat</button></a>
                                </div>
                            </div>
                            <div class="category-item">
                                <div class="category-label">Bukti Foto/Video</div>
                                <div class="category-value">
                                    <a href="{{ asset('storage/reports') . '/' . $item->gambar }}" target="_blank"><button
                                            class="btn btn-outline-secondary">Lihat</button></a>
                                </div>
                            </div>
                            <div class="category-item">
                                <div class="category-label">Aksi</div>
                                <div class="category-value d-flex gap-2">
                                    <a href="{{ url('/lapor').'/edit/'.$item->id }}" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{ url('/lapor').'/'.$item->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Laporan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="category-item">
                                <div class="category-label">.</div>
                                <div class="category-value">
                                    <a href="{{ url('/lapor').'/edit/'.$item->id }}" class="btn btn-outline-secondary">Edit</a>

                                    <form action="{{ url('/lapor').'/'.$item->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
