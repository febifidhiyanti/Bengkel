<?php

use Illuminate\Database\Seeder;

class BahanPerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BahanPerbaikan::insert([
            [
                'nama_bahan'  => 'Aluminium Alloy',
                'harga' => '50000'
            ],
            [
                'nama_bahan'  => 'Baja Stainless',
                'harga' => '60000'
            ],
            [
                'nama_bahan'  => 'Baja Karbon',
                'harga' => '65000'
            ],
            [
                'nama_bahan'  => 'Kuningan',
                'harga' => '100000'
            ]
        ]);
    }
}
