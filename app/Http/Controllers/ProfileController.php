<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.profile.index', compact('user'));
    }

    public function profile(){
        $user = User::where('id', Auth::user()->id)->first();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'password' => 'min:8', 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->no_telp = $request -> no_telp;
        $user->alamat = $request -> alamat;
        if($request->file('photo')){
			$file = $request->file('photo');
			$extension = $file->getClientOriginalExtension();
			$filename = time() . '_' . $extension;
			$file->move('gambar_user' , $filename);
			$user->photo = $filename;
			}
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        // dd($user);
        $user->save();
        // return view('user.profile.index', compact('user'));
        return redirect('profile')->with(['success' => 'data pengguna berhasil diubah']);
    }

    public function updateprofile(Request $request){

        $this->validate($request,[
            'password' => 'min:8', 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->no_telp = $request -> no_telp;
        $user->alamat = $request -> alamat;
        if($request->file('photo')){
			$file = $request->file('photo');
			$extension = $file->getClientOriginalExtension();
			$filename = time() . '_' . $extension;
			$file->move('gambar_user' , $filename);
			$user->photo = $filename;
			}
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->update();
        // return view('user.profile.index', compact('user'));
        return redirect('admin/profile')->with(['success' => 'Profile berhasil diubah']);
    }
}
