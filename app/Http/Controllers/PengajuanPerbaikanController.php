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

class PengajuanPerbaikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //bagian user untuk penampilan perbaikan
    public function pengajuan(){
		$perbaikan = Perbaikan::paginate(20);
        $alat = Alat::get();
        $bahan_perbaikan = BahanPerbaikan::get();
        $waktu_perbaikan = WaktuPerbaikan::get();
		return view('user/detail_perbaikan',['perbaikan' => $perbaikan, 'alat'=> $alat, 'bahan_perbaikan' => $bahan_perbaikan, 'waktu_perbaikan' => $waktu_perbaikan]);
	}

    //bagian pesan di user untuk menyimpan data check out masuk ke data perbaikan yang ada check out nya
    public function pesan(Request $request, $id_perbaikan){
        // dd($request);
        $perbaikan = Perbaikan::where('id_perbaikan', $id_perbaikan)->first();
        $tanggal = Carbon::now();

        //cek validasi
        $cek_pengajuan = Pengajuan::where('user_id', Auth::user()->id)->where('status', "belum")->first();

        //simpan database pesanan
        if(empty($cek_pengajuan))
        {
            $pengajuan = new Pengajuan;
            $pengajuan->user_id = Auth::user()->id;
            $pengajuan -> perbaikan_id = $id_perbaikan;
            $pengajuan->tanggal_perbaikan = $tanggal;
            $pengajuan->jumlah_harga = 0;
            $pengajuan->kode = mt_rand(100, 999);
            $pengajuan->status = "belum";
            $pengajuan->save();
        }
        
        //simpan ke database pesanan detail 
        $pengajuan_baru = Pengajuan::where('user_id', Auth::user()->id)->where('status', 'belum')->first();

        //cek pesanan detail
        $cek_pengajuan_detail = DetailPengajuan::where('perbaikan_id', $id_perbaikan)->where('pengajuan_id', $pengajuan_baru->id_pengajuan)->first();
        
        if (empty($cek_pengajuan_detail))
        {
            $detail_pengajuan = new DetailPengajuan;
            $detail_pengajuan -> user_id = Auth::user()->id;
            $detail_pengajuan -> perbaikan_id = $id_perbaikan;
            $detail_pengajuan -> pengajuan_id = $pengajuan_baru->id_pengajuan;
            $detail_pengajuan -> jumlah = $request-> jumlah_pesan;
            $detail_pengajuan -> ket_perbaikan = $request-> ket_perbaikan;
            $detail_pengajuan -> jumlah_harga = $perbaikan->jumlah_perbaikan*$request->jumlah_pesan;
            $detail_pengajuan -> save(); 
        }else{
            $detail_pengajuan = DetailPengajuan::where('perbaikan_id', $id_perbaikan)->where('pengajuan_id', $pengajuan_baru->id_pengajuan)->first();
            $detail_pengajuan -> jumlah = $detail_pengajuan->jumlah + $request-> jumlah_pesan;
            $detail_pengajuan -> ket_perbaikan =  $request-> ket_perbaikan ;

            //harga sekarang
            $detail_pengajuan -> jumlah_harga =  $detail_pengajuan -> jumlah_harga +  $perbaikan->jumlah_perbaikan*$request->jumlah_pesan;
            $detail_pengajuan->update();
        }

        //jumlah total
        $pengajuan = Pengajuan::where('user_id', Auth::user()->id)->where('status', "belum")->first();
        $pengajuan->jumlah_harga = $pengajuan->jumlah_harga + $perbaikan->jumlah_perbaikan*$request->jumlah_pesan;
        $pengajuan->update();
        // dd($request);
        return redirect('/layanan/detail/perbaikan')->with(['success' => 'Selamat Data Perbaikan Anda Diterima']);
    }

    //hapus data di dalam halaman data perbaikan 
    public function hapus (Request $request){
        // $plant = $request->id_plant;
        DB::table('perbaikan')->where('id_perbaikan', $request->id_perbaikan)->delete();
        return redirect('/layanan/detail/pengajuan')->with('success','Pengajuan berhasil dihapus');    
    }
    
    //check out di bagian perbaikan
    public function check_out(){
        // $perbaikan = Perbaikan::where('perbaikan_id', $id_perbaikan)->first();      
        $pengajuan = Pengajuan::where('user_id', Auth::user()->id)->where('status', "belum")->first();
            
            //relasi
            if(!empty($pengajuan))
            {
                $detail_pengajuan = DetailPengajuan::where('pengajuan_id', $pengajuan-> id_pengajuan)->get();
                return view('user/perbaikan/pesan', compact('pengajuan', 'detail_pengajuan'));
            }   

            return view('user/perbaikan/pesan')->with('success','Maaf Tidak Ada Perbaikan'); 
        }

    //hapus data di perbaikan -> check-out 
    public function delete($id_detail_pengajuan){
        $detail_pengajuan = DetailPengajuan::where('id_detail_pengajuan', $id_detail_pengajuan)->first();

        $pengajuan = Pengajuan::where('id_pengajuan', $detail_pengajuan->pengajuan_id)->first();
        $pengajuan->jumlah_harga = $pengajuan->jumlah_harga - $detail_pengajuan->jumlah_harga;
        $pengajuan->update();

        $detail_pengajuan->delete();

        return redirect('/layanan/detail/perbaikan')->with('success','Pengajuan berhasil dihapus');
    }

    //konfirmasi ketika klik check out, masuk halaman history
    public function konfirmasi(){

        $user = User::where('id', Auth::user()->id)->first();
       
        if(empty($user->alamat))
        {
            return redirect('profile')->with(['success' => 'Identitas harap dilengkapi']);
        }

        if(empty($user->no_telp))
        {
            return redirect('profile')->with(['success' => 'Identitas harap dilengkapi']);
        }

        $pengajuan = Pengajuan::where('user_id', Auth::user()->id)->where('status', 'belum')->first();
        
        $pengajuan_id = $pengajuan -> id_pengajuan;
        $pengajuan->status = "sudah";
        $pengajuan->status_perbaikan = "belum";
        $pengajuan->status_antar = "belum";
        $pengajuan->update();

        return redirect('history/'.$pengajuan_id)->with(['success' => 'Selamat Anda sudah Check-Out']);
    }

    //HALAMAN ADMIN
    //bagian admin -> pembayaran 
    public function pembayaran(){
		$perbaikan = Perbaikan::paginate(20);
        $pengajuan = Pengajuan::get();
        $user = User::get();
        // dd($pengajuan);
		return view('admin/pembayaran/index',['perbaikan' => $perbaikan, 'pengajuan'=> $pengajuan, 'user'=>$user]);
	}

    //bagian admin -> untuk merubah status pembayaran
    public function updatepembayaran(Request $request, $id_pengajuan){
        // dd($pengajuan);
        $pengajuan = Pengajuan::find($id_pengajuan);
        if(empty($pengajuan->status)) {
            return redirect('admin/beranda');
         }
		$pengajuan->status = $request->status;
        // dd($pengajuan);
        $pengajuan->save();
        return redirect('admin/pembayaran');
    }

    // public function upload_perbaikan(Request $request){
    //     $tanggal = Carbon::now();

    //     $pengajuan = new Pengajuan;
    //     $pengajuan->perbaikan_id = $request->id_perbaikan;
    //     $pengajuan->user_id = $request->id;
    //     $pengajuan->tanggal_perbaikan = $tanggal;
    //     $pengajuan->jumlah_harga = $request->jumlah_pesan;
    //     $pengajuan->kode = mt_rand(100, 999);
    //     $pengajuan->status = "belum";
    //     $pengajuan->save();

    //     //simpan ke database pesanan detail 
    //     $pengajuan_baru = Pengajuan::where('user_id', Auth::user()->id)->where('status', 'belum')->first();

    //     //cek pesanan detail
    //     $cek_pengajuan_detail = DetailPengajuan::where('pengajuan_id', $pengajuan_baru->id_pengajuan)->first();
        

    //     if (empty($pengajuan_baru))
    //     {
    //         $detail_pengajuan = new DetailPengajuan;
    //         $detail_pengajuan -> user_id = Auth::user()->id;
    //         $detail_pengajuan -> perbaikan_id = $request->id_perbaikan;
    //         $detail_pengajuan -> pengajuan_id = $pengajuan_baru->id_pengajuan;
    //         $detail_pengajuan -> jumlah = $request-> jumlah_pesan;
    //         $detail_pengajuan -> ket_perbaikan = $request-> ket_perbaikan;
    //         $detail_pengajuan -> jumlah_harga = $request->jumlah_pesan;
    //         $detail_pengajuan -> save(); 
    //     }else{
    //         $detail_pengajuan = DetailPengajuan::where('perbaikan_id', $id_perbaikan)->where('pengajuan_id', $pengajuan_baru->id_pengajuan)->first();
    //         $detail_pengajuan -> jumlah = $detail_pengajuan->jumlah + $request-> jumlah_pesan;
    //         $detail_pengajuan -> ket_perbaikan =  $request-> ket_perbaikan ;

    //         //harga sekarang
    //         $detail_pengajuan -> jumlah_harga =  $detail_pengajuan -> jumlah_harga;
    //         $detail_pengajuan->update();
    //     }

    //     // dd($request->all());
    //     return redirect()->back();
    // }

    public function destroy($id_pengajuan)
    {
        // $perbaikan = Perbaikan::where('id_perbaikan', $id_perbaikan)->first();
        $pengajuan = Pengajuan::withCount(['detail_pengajuan'])->find($id_pengajuan);
        if ($pengajuan->detail_pengajuan_count == 0) {
            $pengajuan->delete();
                
            return redirect('/admin/data_perbaikan')->with(['success'=>'Data Perbaikan Berhasil Dihapus!']);
        }
        return redirect('/admin/data_perbaikan')->with(['error' => 'Data Perbaikan sedang digunakan, Hapus dulu Pengajuan']);
    }
            
       // menampilkan data-perbaikan
    public function data_perbaikan(){
        $perbaikan = Perbaikan::get();
        $pengajuan = Pengajuan::get();
        $user = User::get();
        // dd($pengajuan);
		return view('admin/data_perbaikan/index',['perbaikan' => $perbaikan, 'pengajuan'=> $pengajuan, 'user'=>$user]);
	}

    //bagian admin -> untuk merubah status data_perbaikan
    public function updatedataperbaikan(Request $request, $id_pengajuan){
        // dd($pengajuan);
        $pengajuan = Pengajuan::find($id_pengajuan);
        if(empty($pengajuan->status_perbaikan)) {
            return redirect('admin/beranda');
         }
		$pengajuan->status_perbaikan= $request->status_perbaikan;
        // dd($pengajuan);
        $pengajuan->save();
        return redirect('admin/data_perbaikan');
    }

    public function laporan(){
		$pengajuan = Pengajuan::get();
		return view('admin/pengajuan/laporan',['pengajuan' => $pengajuan]);
	}

    public function cetak_pengajuan(){
		$pengajuan = Pengajuan::get();
		return view('admin/pengajuan/cetak-pengajuan',['pengajuan' => $pengajuan]);
	}

    public function cetak_pengajuan_pertanggal($tglawal, $tglakhir){
		// dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
		$cetakpertanggal = Pengajuan::get()->whereBetween('tanggal_perbaikan',[$tglawal, $tglakhir]);
		return view('admin.pengajuan.cetak-pengajuan-form', compact('cetakpertanggal'));
	}

    //bagian admin -> untuk menampilkan data-antar
    public function data_antar(){
		$perbaikan = Perbaikan::paginate(20);
        $pengajuan = Pengajuan::get();
        $user = User::get();
        // dd($pengajuan);
		return view('admin/data_antar/index',['perbaikan' => $perbaikan, 'pengajuan'=> $pengajuan, 'user'=>$user]);
	}

    //bagian admin -> untuk merubah status data_antar
    public function updatedataantar(Request $request, $id_pengajuan){
        // dd($pengajuan);
        $pengajuan = Pengajuan::find($id_pengajuan);
        if(empty($pengajuan->status_perbaikan)) {
            return redirect('admin/beranda');
         }
		$pengajuan->status_antar= $request->status_antar;
        // dd($pengajuan);
        $pengajuan->save();
        return redirect('admin/data_antar');
    }    
}
