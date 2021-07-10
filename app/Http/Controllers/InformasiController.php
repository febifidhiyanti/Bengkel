<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class InformasiController extends Controller
{
    public function index(){
		$informasi = Informasi::get();
		return view('admin/informasi/index',['informasi' => $informasi]);
	}

	public function index1(){
		$informasi = Informasi::get();
		return view('user/informasi',['informasi' => $informasi]);
	}

    public function proses_upload(Request $request){
		
		$this->validate($request, [
			'judul_informasi' => 'required|min:2|max:20',
			'isi_informasi' => 'required',
			'tanggal_informasi' => 'required',
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'ket_informasi' => 'required|min:5',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		if($request->file('file')){
			$file = $request->file('file'); 
			$nama_file = time()."_".$file->getClientOriginalName();
      	    // isi dengan nama folder tempat kemana file diupload
			$tujuan_upload = 'data_file';
			$file->move($tujuan_upload,$nama_file);
		} else{
			$file=NULL;
		}

		Informasi::create([
			'judul_informasi' => $request->judul_informasi,
			'isi_informasi' => $request->isi_informasi,
			'tanggal_informasi' => $request->tanggal_informasi,
			'file' => $nama_file,
			'ket_informasi' => $request->ket_informasi,
		]);

		return redirect()->back();
	}

	public function destroy(Informasi $informasi)
    {
        Informasi::destroy($informasi->id_informasi);
        return redirect('/admin/informasi')->with(['success' => 'Data Informasi Berhasil Dihapus!']);
    }

	public function edit(Informasi $informasi)
    {
        $informasi = Informasi::find($informasi->id_informasi);
        return view('admin/informasi/edit', ['informasi' => $informasi]);
		// dd($request);
    }

	public function update(Request $request, Informasi $informasi)
    {
		$this->validate($request, [
			'judul_informasi' => 'required|min:2|max:20',
			'isi_informasi' => 'required',
			'tanggal_informasi' => 'required',
			'ket_informasi' => 'required|min:5',
		]);

		// dd($informasi);
		$informasi = Informasi::find($informasi->id_informasi);

		$informasi->judul_informasi = $request->input('judul_informasi');
		$informasi->isi_informasi = $request->input('isi_informasi');
		$informasi->tanggal_informasi = $request->input('tanggal_informasi');
		$informasi->ket_informasi = $request->input('ket_informasi');
		// $informasi->file = $request->input('file');

		if($request->file('file')){
			$file = $request->file('file');
			$extension = $file->getClientOriginalExtension();
			$filename = time() . '_' . $extension;
			$file->move('data_file' , $filename);
			$informasi->file = $filename;
			}
		// dd($informasi);
		$informasi->save();
		return redirect('/admin/informasi')->with(['success' => 'Data Informasi Berhasil Diubah!']);
    }

	public function laporan(){
		$informasi = Informasi::get();
		return view('admin/informasi/laporan',['informasi' => $informasi]);
	}

	public function cetak_informasi(){
		$informasi = Informasi::get();
		return view('admin/informasi/cetak-informasi',['informasi' => $informasi]);
	}

	public function cetak_informasi_pertanggal($tglawal, $tglakhir){
		// dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
		$cetakpertanggal = Informasi::get()->whereBetween('tanggal_informasi',[$tglawal, $tglakhir])->latest();
		return view('admin.informasi.cetak-informasi-form', compact('cetakpertanggal'));
	}

}

