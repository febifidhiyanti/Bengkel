<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BahanPerbaikan;

class BahanPerbaikan extends Model
{
    protected $table = 'bahan_perbaikan';
    protected $fillable = ['nama_bahan','harga'];
    protected $primaryKey = 'id_bahan_perbaikan';

    public function perbaikan(){
        return $this->hasMany('App\Perbaikan','alat_id');
    }

}
