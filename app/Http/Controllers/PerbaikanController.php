<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Perbaikan;
use App\Alat;  
use App\BahanPerbaikan;
use App\WaktuPerbaikan;
use App\Pengajuan;
use App\DetailPengajuan;
use App\User;

class PerbaikanController extends Controller
{
    public function index(){
		$perbaikan = Perbaikan::get();
        $alat = Alat::get();
        $bahan_perbaikan = BahanPerbaikan::get();
        $waktu_perbaikan = WaktuPerbaikan::get();
		return view('admin/perbaikan/index',['perbaikan' => $perbaikan, 'alat'=> $alat, 'bahan_perbaikan' => $bahan_perbaikan, 'waktu_perbaikan' => $waktu_perbaikan]);
	}

    public function AdminPengajuan(){
        $detail_pengajuan = DetailPengajuan::get();
        $perbaikan = Perbaikan::get();
        $pengajuan = Pengajuan::get();
        $user = User::get();
        return view('admin/pengajuan/index',['detail_pengajuan' => $detail_pengajuan, 'perbaikan' => $perbaikan, 'pengajuan' => $pengajuan, 'user' => $user ]);
    }

    public function deletepengajuan($id_detail_pengajuan)
    {
         $detail_pengajuan = DetailPengajuan::find($id_detail_pengajuan);
         if ($detail_pengajuan) {
            $detail_pengajuan->delete();
                
            return redirect('/admin/pengajuan')->with(['success'=>'Pengjuan Berhasil Dihapus!']);
        }

        return redirect('/admin/pengajuan')->with(['error' => 'Pengajuan sedang digunakan']);
    }
    

	
// dd($perbaikan);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $nm = $request ->image;
        $namaFile = $nm->getClientOriginalName();

        $perbaikan = new Perbaikan;
        $perbaikan->nama = $request->nama;
        $perbaikan->alat_id = $request->id_alat;
        $perbaikan->bahan_perbaikan_id = $request->id_bahan_perbaikan;
        $perbaikan->waktu_perbaikan_id = $request->id_waktu_perbaikan;
        $perbaikan->image = $namaFile;

        $perbaikan->jumlah_perbaikan = $request -> jumlah_perbaikan;

        $nm->move(public_path().'/gambar_perbaikan', $namaFile);
        $perbaikan->save();

        
        // dd($request->all());
        return redirect()->back();
    }

    public function edit(Perbaikan $perbaikan)
    {
        $perbaikan = Perbaikan::find($perbaikan->id_perbaikan);
        $waktu_perbaikan = WaktuPerbaikan::all();
        $alat = Alat::all();
        $bahan_perbaikan = BahanPerbaikan::all();
        return view('admin/perbaikan/edit', ['perbaikan' => $perbaikan, 'waktu_perbaikan' => $waktu_perbaikan, 'alat' => $alat, 'bahan_perbaikan' => $bahan_perbaikan]);
    }

    public function update(Request $request, Perbaikan $perbaikan)
    {
        // $this->validate($request, [
		// 	'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		// ]);

		// dd($informasi);
        $perbaikan = Perbaikan::find($perbaikan->id_perbaikan);

        $perbaikan->nama = $request->input('nama');
        $perbaikan->alat_id = $request->id_alat;
        $perbaikan->bahan_perbaikan_id = $request->id_bahan_perbaikan;
        $perbaikan->waktu_perbaikan_id = $request->id_waktu_perbaikan;
		$perbaikan->jumlah_perbaikan = $request->input('jumlah_perbaikan');
		// $informasi->file = $request->input('file');

		if($request->file('image')){
			$file = $request->file('image');
			$extension = $file->getClientOriginalExtension();
			$filename = time() . '_' . $extension;
			$file->move('gambar_perbaikan' , $filename);
			$perbaikan->image = $filename;
			}
		// dd($perbaikan);
		$perbaikan->save();

		return redirect('/admin/perbaikan')->with(['success' => 'Data Perbaikan Berhasil Diubah!']);
    }

    public function destroy($id_perbaikan)
    {
        // $perbaikan = Perbaikan::where('id_perbaikan', $id_perbaikan)->first();
        $perbaikan = Perbaikan::withCount(['detail_pengajuan'])->find($id_perbaikan);
        if ($perbaikan->detail_pengajuan_count == 0) {
            $perbaikan->delete();
                
            return redirect('/admin/perbaikan')->with(['success'=>'Data Perbaikan Berhasil Dihapus!']);
        }

        return redirect('/admin/perbaikan')->with(['success' => 'Data Perbaikan sedang digunakan']);
    }

    public function laporan(){
		$perbaikan = Perbaikan::get();
		return view('admin/perbaikan/laporan',['perbaikan' => $perbaikan]);
	}

    public function cetak_perbaikan(){
		$perbaikan = Perbaikan::get();
		return view('admin/perbaikan/cetak-perbaikan',['perbaikan' => $perbaikan]);
	}
}