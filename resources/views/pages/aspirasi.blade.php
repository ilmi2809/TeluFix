@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="form-container">
            <h2><b>Tambah Aspirasi</b></h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('aspirasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Jenis Aspirasi</label>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="saran/masukkan" id="saran/masukkan" required>
                            <label class="form-check-label" for="saran/masukkan">Saran/Masukkan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="keluhan" id="keluhan">
                            <label class="form-check-label" for="keluhan">
                                Keluhan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="inovasi" id="inovasi">
                            <label class="form-check-label" for="inovasi">
                                Inovasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_masalah" value="lainnya" id="lainnya">
                            <label class="form-check-label" for="lainnya">
                                Lainnya
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Aspirasi</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                </div>

                <label class="form-label">Apakah Anda bersedia jika identitas Anda dipublikasikan?</label>
                <div class="radio-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publikasi" value="Bersedia" id="Bersedia" required>
                        <label class="form-check-label" for="Bersedia">Bersedia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publikasi" value="Tidak Bersedia" id="Tidak_Bersedia">
                        <label class="form-check-label" for="Tidak_Bersedia">Tidak Bersedia</label>
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
