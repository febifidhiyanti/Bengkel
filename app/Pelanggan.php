<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pelanggan;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = ['user_id','nama_pelanggan','alamat_pelanggan','email_pelanggan','pass_pelanggan','no_telp_pelanggan','jk_pelanggan','ket_pelanggan'];
    protected $primaryKey = 'id_pelanggan';

    public function perbaikan()
    {
    	return $this->belongsTo(Perbaikan::class,'perbaikan_id');
    }
}
