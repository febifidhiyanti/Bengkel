<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Pengajuan;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pengajuan(){
        return $this->hasMany('App\Pengajuan','user_id');
    }

    public function pelanggan(){
        return $this->hasMany('App\Pelanggan','user_id','id_pelanggan');
    }

    public function detail_pengajuan(){
        return $this->hasMany('App\DetailPengajuan','user_id');
    }

    //KARENA USER BISA MEMILIKI LEBIH DARI 1 PESAN, MAKA KITA GUNAKAN hasMany
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
