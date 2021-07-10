<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perbaikan;
use App\Alat;  
use App\BahanPerbaikan;
use App\WaktuPerbaikan;

class Perbaikan extends Model
{
    protected $table = "perbaikan";
    protected $fillable = ['nama','alat_id','waktu_perbaikan_id','bahan_perbaikan_id','file','keterangan','jumlah_perbaikan'];
    protected $primaryKey = 'id_perbaikan';
  
    public function alat(){
        return $this->belongsTo('App\Alat','alat_id');
    }

    public function waktu_perbaikan(){
        return $this->belongsTo('App\WaktuPerbaikan','waktu_perbaikan_id');
    }

    public function bahan_perbaikan(){
        return $this->belongsTo('App\BahanPerbaikan','bahan_perbaikan_id');
    }

    public function detail_pengajuan(){
        return $this->hasMany('App\DetailPengajuan','perbaikan_id');
    }

    public function pengajuan(){
        return $this->hasMany('App\Pengajuan','perbaikan_id');
    }
}
