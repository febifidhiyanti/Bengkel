<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perbaikan;
use App\Pengajuan;
use App\User;

class DetailPengajuan extends Model
{
    protected $table = "detail_pengajuan";
    protected $fillable = ['user_id','perbaikan_id','pengajuan_id','jumlah','jumlah_harga'];
    protected $primaryKey = 'id_detail_pengajuan';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function perbaikan(){
        return $this->belongsTo('App\Perbaikan','perbaikan_id');
    }

    public function pengajuan(){
        return $this->belongsTo('App\Pengajuan','pengajuan_id');
    }
}
