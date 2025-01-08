@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="form-container">
            <h2><b>Edit Laporan</b></h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/lapor').'/'.$report->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label">Jenis Masalah</label>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="kerusakan" id="kerusakan" {{ $report->jenis_masalah == "kerusakan" ? 'checked' : '' }} required>
                            <label class="form-check-label" for="kerusakan">Kerusakan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="kehilangan" id="kehilangan" {{ $report->jenis_masalah == "kehilangan" ? 'checked' : '' }}>
                            <label class="form-check-label" for="kehilangan">
                                Kehilangan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="kebersihan" id="kebersihan" {{ $report->jenis_masalah == "kebersihan" ? 'checked' : '' }}>
                            <label class="form-check-label" for="kebersihan">
                                Kebersihan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="pencahayaan" id="pencahayaan" {{ $report->jenis_masalah == "pencahayaan" ? 'checked' : '' }}>
                            <label class="form-check-label" for="pencahayaan">
                                Pencahayaan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="lainnya" id="lainnya" {{ $report->jenis_masalah == "lainnya" ? 'checked' : '' }}>
                            <label class="form-check-label" for="lainnya">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Masalah</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required>{{ old('deskripsi') ?? $report->deskripsi }}</textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kejadian *</label>
                        <input type="date" name="tanggal_kejadian" class="form-control" value="{{ old('tanggal_kejadian') ?? $report->tanggal_kejadian }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Waktu *</label>
                        <input type="time" name="waktu_kejadian" class="form-control" value="{{ old('waktu_kejadian') ?? $report->waktu_kejadian }}" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Lokasi</label>
                        <div class="map-container">
                            <div id="map" style="height: 300px;"></div>
                            <input type="hidden" name="latitude" id="latitude" value="{{ explode(',',$report->lokasi)[0] }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ explode(',',$report->lokasi)[1] }}">
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
