<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_masalah' => 'required',
            'deskripsi' => 'required',
            'publikasi' => 'required|in:Bersedia,Tidak Bersedia',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:51200'
        ]);

        try {
            $aspirasi = new Aspirasi();
            $aspirasi->user_id = Auth::id();
            $aspirasi->jenis_masalah = $request->jenis_masalah;
            $aspirasi->deskripsi = $request->deskripsi;
            $aspirasi->publikasi = $request->publikasi;

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('aspirasi', $filename, 'public');
                $aspirasi->gambar = $filename;
            }

            $aspirasi->save();

            return redirect()->route('histori_aspirasi')->with('success', 'Aspirasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id) {
        $aspirasi = Aspirasi::findOrFail($id);
        return view('pages.aspirasi_edit', compact('aspirasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_masalah' => 'required',
            'deskripsi' => 'required',
            'publikasi' => 'required',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:51200'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);

        // Verify if the aspirasi belongs to the authenticated user
        if ($aspirasi->user_id !== Auth::id()) {
            return redirect()->route('histori_aspirasi')
                           ->with('error', 'Anda tidak memiliki akses untuk mengedit aspirasi ini.');
        }

        $aspirasi->jenis_masalah = $request->jenis_masalah;
        $aspirasi->deskripsi = $request->deskripsi;
        $aspirasi->publikasi = $request->publikasi;


        $aspirasi->save();

        return redirect()->route('histori_aspirasi')
                       ->with('success', 'Aspirasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);

        // Verify if the aspirasi belongs to the authenticated user
        if ($aspirasi->user_id !== Auth::id()) {
            return redirect()->route('histori_aspirasi')
                           ->with('error', 'Anda tidak memiliki akses untuk menghapus aspirasi ini.');
        }


        $aspirasi->delete();

        return redirect()->route('histori_aspirasi')
                       ->with('success', 'Aspirasi berhasil dihapus!');
    }
}
