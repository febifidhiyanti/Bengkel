<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;

class AdminController extends Controller
{
    public function index(){
		$admin = Admin::get();
		return view('admin/admin/index',['admin' => $admin]);
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
			'nama_admin' => 'required|min:5|max:20',
			'alamat_admin' => 'required',
			'email_admin' => 'required',
			'pass_admin' => 'required',
			'no_telp_admin' => 'required|numeric',
            'jk_admin' => 'required',    
			// 'foto_admin' => 'required', 
			// 'ket_admin' => 'required', 
		]);

            //insert ke table users
            $user = new \App\User;
            $user -> role = $request -> role_admin;
            $user -> name = $request -> nama_admin;
            $user -> email = $request -> email_admin;
            $user -> password = bcrypt($request -> pass_admin);
            $user -> alamat = $request -> alamat_admin;
            $user -> no_telp= $request -> no_telp_admin;
            // $user -> remember_token = str_random(60);
            $user -> save(); 
            
            //insert ke table admin
            $request->request->add(['user_id' => $user->id]);
            $admin = \App\Admin::create($request->all());


        return redirect('/admin/admin')->with(['success' => 'Data admin Berhasil Ditambahkan!']);
    }

}
