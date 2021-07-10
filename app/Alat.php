<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alat;

class Alat extends Model
{
    protected $table = 'alat';
    protected $fillable = ['perlakuan','harga'];
    protected $primaryKey = 'id_alat';

    public function perbaikan(){
        return $this->hasMany('App\Perbaikan','alat_id');
    }
}
