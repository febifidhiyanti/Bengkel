<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pegawai;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $fillable = ['nama_pegawai','bidang','alamat_pegawai','jk_pegawai','no_telpon_pegawai','email_pegawai','file','ket_pegawai'];
    protected $primaryKey = 'id_pegawai';

    // public function perbaikan()
    // {
    // 	return $this->belongsTo('App\Perbaikan','perbaikan_id');
    // }
    public function pengajuan()
    {
    	return $this->belongsTo('App\Pengajuan','perbaikan_id');
    }

}