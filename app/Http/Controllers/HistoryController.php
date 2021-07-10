<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Perbaikan;
use App\Alat;  
use App\BahanPerbaikan;
use App\WaktuPerbaikan;
use App\DetailPengajuan;
use App\Pengajuan;
use App\User;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $pengajuan = Pengajuan::where('user_id', Auth::user()->id )->where('status', '!=', "belum")->get();

        return view ('user.history.index', compact('pengajuan'));
    }

    public function detail($id_pengajuan){
       
        $pengajuan = Pengajuan::where('id_pengajuan', $id_pengajuan)->first();
        $detail_pengajuan = DetailPengajuan::where('pengajuan_id', $pengajuan-> id_pengajuan)->get();
                 
        return view('user.history.detail', compact('pengajuan', 'detail_pengajuan'));
    }
}
