<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\User;

class PelangganController extends Controller
{
    public function index(){
		$pelanggan = Pelanggan::get();
		return view('admin/pelanggan/index',['pelanggan' => $pelanggan]);
	}

	 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'nama_pelanggan' => 'required|min:5|max:20',
			'alamat_pelanggan' => 'required',
			'email_pelanggan' => 'required',
			'pass_pelanggan' => 'required',
			'no_telp_pelanggan' => 'required|numeric',
            'jk_pelanggan' => 'required',    
			// 'foto_pelanggan' => 'required', 
			'ket_pelanggan' => 'required', 
		]);

            //insert ke table users
            $user = new \App\User;
            $user -> role = 'pelanggan';
            $user -> name = $request -> nama_pelanggan;
            $user -> email = $request -> email_pelanggan;
            $user -> password = bcrypt($request -> pass_pelanggan);
            $user -> alamat = $request -> alamat_pelanggan;
            $user -> no_telp= $request -> no_telp_pelanggan;
            // $user -> remember_token = str_random(60);
            $user -> save(); 
            
            //insert ke table pelanggan
            $request->request->add(['user_id' => $user->id]);
            $pelanggan = \App\Pelanggan::create($request->all());


        return redirect('/admin/pelanggan')->with(['success' => 'Data Pelanggan Berhasil Ditambahkan!']);
    }

    public function laporan_pelanggan(){
        $pelanggan = Pelanggan::get();
		return view('admin/pelanggan/laporan',['pelanggan' => $pelanggan]);
	}

	public function cetak_pelanggan(){
		$pelanggan = Pelanggan::get();
		return view('admin/pelanggan/cetak-pelanggan',['pelanggan' => $pelanggan]);
	}

}
