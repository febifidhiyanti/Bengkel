<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Perbaikan;
use App\Alat;  
use App\BahanPerbaikan;
use App\Pegawai;
use App\Pelanggan;
use App\Pengajuan;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
        $pengajuan = Pengajuan::count();
        $user = User::all();
        return view('user.beranda', compact('pegawai', 'pelanggan', 'pengajuan', 'user'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function private()
    {
        return view('private');
    }

    public function users()
    {
        return User::all();
    }

}
