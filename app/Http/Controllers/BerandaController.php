<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Pelanggan;
use App\Pengajuan;
use App\User;

class BerandaController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::count();
        $pelanggan = Pelanggan::count();
        $pengajuan = Pengajuan::count();
        $user = User::count();
        return view('admin.beranda', compact('pegawai', 'pelanggan', 'pengajuan', 'user'));
    }

    public function profile()
    {
        $user = User::all();
        return view('admin.profile', compact('user'));
    }

    public function beranda()
    {
        return view('user.welcome');
    }
    
}
