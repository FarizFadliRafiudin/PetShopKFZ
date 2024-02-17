<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\LogM;

use Illuminate\Http\Request;

class LogC extends Controller
{
    public function index(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Log'
        ]);

        $query = LogM::select('users.*', 'log.*')->join('users', 'users.id', '=', 'log.id_user')->orderBy('log.id', 'desc')->get();       
        $subtittle = "Daftar Aktivitas";
        return view('log', compact('query', 'LogM', 'subtittle'));
    }
}