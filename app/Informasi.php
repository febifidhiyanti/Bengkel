<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Informasi;

class Informasi extends Model
{
    protected $table = "informasi";
    protected $fillable = ['judul_informasi','isi_informasi','tanggal_informasi','file','ket_informasi'];
    protected $primaryKey = 'id_informasi';
}