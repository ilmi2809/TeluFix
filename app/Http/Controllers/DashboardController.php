<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Report; 

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Report::count();
        $unverified = Report::where('status', 'belum_verifikasi')->count();
        $inProgress = Report::where('status', 'dalam_pengerjaan')->count();
        $completed = Report::where('status', 'selesai')->count();

        return view('pages.dashboard', compact('reports', 'unverified', 'inProgress', 'completed'));
    }

    public function berita()
    {
        return view('pages.berita');
    }

    public function lapor()
    {
        return view('pages.lapor');
    }

    public function histori()
    {
        return view('pages.histori');
    }
}