<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profil');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nim' => 'required',
            'jurusan' => 'required'
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
