@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="form-container">
            <h2>Tambah Laporan</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Jenis Masalah</label>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="kerusakan" id="kerusakan" required>
                            <label class="form-check-label" for="kerusakan">Kerusakan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="masalah" id="kehilangan">
                            <label class="form-check-label" for="kehilangan">
                                Kehilangan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="masalah" id="kebersihan">
                            <label class="form-check-label" for="kebersihan">
                                Kebersihan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="masalah" id="pencahayaan">
                            <label class="form-check-label" for="pencahayaan">
                                Pencahayaan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="masalah" id="lainnya">
                            <label class="form-check-label" for="lainnya">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Masalah</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kejadian *</label>
                        <input type="date" name="tanggal_kejadian" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Waktu *</label>
                        <input type="time" name="waktu_kejadian" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Lokasi</label>
                        <div class="map-container">
                            <div id="map" style="height: 300px;"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bukti Foto/Video</label>
                        <div class="file-upload">
                            <i class='bx bx-cloud-upload'></i>
                            <p class="mb-2">Choose a file or drag & drop it here</p>
                            <p class="text-muted small">JPEG, PNG, PDG, and MP4 formats, up to 50MB</p>
                            <input type="file" name="gambar" class="form-control" accept="image/*,video/*">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>
@endsection