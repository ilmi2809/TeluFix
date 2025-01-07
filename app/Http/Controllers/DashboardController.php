<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\News;
use App\Models\Aspirasi;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Report::count();
        $unverified = Report::where('status', 'belum_verifikasi')->count();
        $inProgress = Report::where('status', 'dalam_pengerjaan')->count();
        $completed = Report::where('status', 'selesai')->count();

        // Tambahkan ini untuk mengambil notifikasi
        $notifications = Notification::where('user_id', auth()->id())
                                   ->orderBy('created_at', 'desc')
                                   ->take(5)
                                   ->get();

        return view('pages.dashboard', compact(
            'reports',
            'unverified',
            'inProgress',
            'completed',
            'notifications'
        ));
    }

    public function berita()
    {
        $news = News::all();
        return view('pages.berita', compact('news'));
    }

    public function lapor()
    {
        return view('pages.lapor');
    }

    public function aspirasi()
    {
        return view('pages.aspirasi');
    }

    public function histori()
    {
        $reports = Report::all();
        return view('pages.histori', compact('reports'));
    }

    public function histori_aspirasi()
    {
        $aspirasi = Aspirasi::where('user_id', auth()->id())
                           ->orderBy('created_at', 'desc')
                           ->get();
        return view('pages.histori_aspirasi', compact('aspirasi'));
    }
}
