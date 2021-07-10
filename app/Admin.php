<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['user_id','nama_admin', 'role_admin', 'alamat_admin','email_admin','pass_admin','no_telp_admin','jk_admin','ket_admin'];
    protected $primaryKey = 'id_admin';

}

