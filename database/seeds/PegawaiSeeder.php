<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            'nama_pegawai' => Str::random(10),
            'bidang' => Str::random(10),
            'alamat_pegawai' => Str::random(10),
            'jk_pegawai' => Str::random(10),
            'no_telpon_pegawai' => Str::random(10),
            'email_pegawai' => Str::random(10).'@gmail.com',
            'foto_pegawai' => Str::random(10),
            'ket_pegawai' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
    }
} 
