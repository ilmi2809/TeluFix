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

            <form action="{{ url('/aspirasi').'/'.$aspirasi->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label">Jenis Masalah</label>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="saran/masukkan" id="saran/masukkan" {{ $aspirasi->jenis_masalah == "saran/masukkan" ? 'checked' : '' }} required>
                            <label class="form-check-label" for="saran/masukkan">Saran/Masukkan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="keluhan" id="keluhan" {{ $aspirasi->jenis_masalah == "keluhan" ? 'checked' : '' }}>
                            <label class="form-check-label" for="keluhan">
                                Keluhan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="inovasi" id="inovasi" {{ $aspirasi->jenis_masalah == "inovasi" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inovasi">
                                Inovasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="lainnya" id="lainnya" {{ $aspirasi->jenis_masalah == "lainnya" ? 'checked' : '' }}>
                            <label class="form-check-label" for="lainnya">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Masalah</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required>{{ old('jenis_masalah') ?? $aspirasi->deskripsi }}</textarea>
                </div>

                <label class="form-label">Apakah Anda bersedia jika identitas Anda dipublikasikan?</label>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publikasi" value="Bersedia" id="Bersedia" {{ old('jenis_masalah') ?? $aspirasi->publikasi }} required>
                            <label class="form-check-label" for="Bersedia">Bersedia</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publikasi" value="Tidak_Bersedia" id="Tidak_Bersedia" {{ old('jenis_masalah') ?? $aspirasi->publikasi }}>
                            <label class="form-check-label" for="Tidak_Bersedia">
                                Tidak Bersedia
                            </label>
                        </div>
                    </div>

                <div class="row mb-4">
                    <label class="form-label">Bukti Foto/Video</label>
                        <div class="file-upload">
                            <i class='bx bx-cloud-upload'></i>
                            <p class="mb-2">Choose a file or drag & drop it here</p>
                            <p class="text-muted small">JPEG, PNG, PDG, and MP4 formats, up to 50MB</p>
                            <input type="file" name="gambar" class="form-control" accept="image/*,video/*">
                        </div>
                </div>

                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
