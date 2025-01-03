<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_masalah' => 'required',
            'deskripsi' => 'required',
            'tanggal_kejadian' => 'required|date',
            'waktu_kejadian' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:51200'
        ]);

        $report = new Report();
        $report->user_id = Auth::id();
        $report->jenis_masalah = $request->jenis_masalah;
        $report->deskripsi = $request->deskripsi;
        $report->tanggal_kejadian = $request->tanggal_kejadian;
        $report->waktu_kejadian = $request->waktu_kejadian;
        $report->lokasi = $request->latitude . ',' . $request->longitude;
        $report->status = 'belum_verifikasi';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/reports', $filename);
            $report->gambar = $filename;
        }

        $report->save();

        return redirect()->route('histori')->with('success', 'Laporan berhasil ditambahkan!');
    }
}