<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $reports = Report::where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();


            return view('histori', ['reports' => $reports]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return view('histori', ['reports' => collect([])]);
        }
    }

}
