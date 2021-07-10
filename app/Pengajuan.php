<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pengajuan;
use App\User;
use App\Perbaikan;


class Pengajuan extends Model
{
    protected $table = "pengajuan";
    protected $fillable = ['perbaikan_id','user_id','ket_antar','file','status','data-antar','data-perbaikan','ket_pengajuan'];
    protected $primaryKey = 'id_pengajuan';


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function detail_pengajuan(){
        return $this->hasMany('App\DetailPengajuan','pengajuan_id');
    }

    public function perbaikan(){
        return $this->belongsTo('App\Perbaikan','perbaikan_id');
    }
}
