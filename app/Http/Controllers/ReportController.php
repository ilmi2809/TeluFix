<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
            $file->storeAs('reports', $filename, 'public');
            $report->gambar = $filename;
        }

        $report->save();

        return redirect()->route('histori')->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function edit($id) {
        $report = Report::findOrFail($id);
        return view('pages.lapor-edit', compact('report'));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'jenis_masalah' => 'required',
            'deskripsi' => 'required',
            'tanggal_kejadian' => 'required|date',
            'waktu_kejadian' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:51200'
        ]);

        $report = Report::findOrFail($id);

        $report->jenis_masalah = $request->jenis_masalah;
        $report->deskripsi = $request->deskripsi;
        $report->tanggal_kejadian = $request->tanggal_kejadian;
        $report->waktu_kejadian = $request->waktu_kejadian;
        $report->lokasi = $request->latitude.','.$request->longitude;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('reports', $filename, 'public');
            $report->gambar = $filename;
        }

        $report->save();

        return redirect()->route('histori')->with('success', 'Laporan berhasil diedit!');
    }

    public function destroy($id) {
        Report::destroy($id);

        return redirect()->route('histori')->with('success', 'Laporan berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
{
    $report = Report::findOrFail($id);
    $oldStatus = $report->status;
    $report->status = $request->status;
    $report->save();

    Notification::create([
        'user_id' => $report->user_id,
        'report_id' => $report->id,
        'message' => "Status laporan Anda telah diperbarui menjadi " . $request->status,
        'status' => $request->status
    ]);

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}
}
