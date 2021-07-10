<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('admin.pegawai.index', ['pegawai' => $pegawai]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function proses_upload(Request $request){
		
		$this->validate($request, [
			'nama_pegawai' => 'required|min:5|max:20',
			'bidang' => 'required',
			'alamat_pegawai' => 'required',
			'jk_pegawai' => 'required',
			'no_telpon_pegawai' => 'required|numeric',
            'email_pegawai' => 'required',      
            'ket_pegawai' => 'required', 
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		
			// $file = $request->file('file'); 
			// $nama_file = time()."_".$file->getClientOriginalName();
      	    // isi dengan nama folder tempat kemana file diupload
			// $tujuan_upload = 'data_file';
			// $file->move($tujuan_upload,$nama_file);

		Pegawai::create([
			'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'bidang' => $request->bidang,
            'alamat_pegawai' => $request->alamat_pegawai,
            'jk_pegawai' => $request->jk_pegawai,
            'no_telpon_pegawai' => $request->no_telpon_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'ket_pegawai' => $request->ket_pegawai,
		]);

		return redirect()->back();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $pegawai = Pegawai::find($pegawai->id_pegawai);
        return view('admin/pegawai/edit', ['pegawai' => $pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        Pegawai::where('id_pegawai', $pegawai->id_pegawai)
        ->update([
            'nama_pegawai' => $request->nama_pegawai,
            'bidang' => $request->bidang,
            'alamat_pegawai' => $request->alamat_pegawai,
            'jk_pegawai' => $request->jk_pegawai,
            'no_telpon_pegawai' => $request->no_telpon_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'ket_pegawai' => $request->ket_pegawai
        ]);
        return redirect('/admin/pegawai')->with(['success' => 'Data Pegawai Berhasil Diubah!']);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id_pegawai);
        return redirect('/admin/pegawai')->with(['success' => 'Data Pegawai Berhasil Dihapus!']);
    }

    public function laporan_pegawai(){
        $pegawai = Pegawai::get();
		return view('admin/pegawai/laporan',['pegawai' => $pegawai]);
	}

	public function cetak_pegawai(){
		$pegawai = Pegawai::get();
		return view('admin/pegawai/cetak-pegawai',['pegawai' => $pegawai]);
	}

}

