<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WaktuPerbaikan;

class WaktuPerbaikan extends Model
{
    protected $table = 'waktu_perbaikan';
    protected $fillable = ['waktu','harga'];
    protected $primaryKey = 'id_waktu_perbaikan';

    public function perbaikan(){
        return $this->hasMany('App\Perbaikan','alat_id');
    }

}
