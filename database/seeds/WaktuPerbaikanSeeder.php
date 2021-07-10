<?php

use Illuminate\Database\Seeder;

class WaktuPerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\WaktuPerbaikan::insert([
            [
                'waktu'  => '1 hari',
                'harga' => '160000'
            ],
            [
                'waktu'  => '2 hari',
                'harga' => '150000'
            ],
            [
                'waktu'  => '3 hari',
                'harga' => '140000'
            ],
            [
                'waktu'  => '4 hari',
                'harga' => '130000'
            ],
            [
                'waktu'  => '5 hari',
                'harga' => '120000'
            ],
            [
                'waktu'  => '6 hari',
                'harga' => '110000'
            ],
            [
                'waktu'  => '1 minggu',
                'harga' => '100000'
            ],
            [
                'waktu'  => '2 minggu',
                'harga' => '60000'
            ],
            [
                'waktu'  => '3 minggu',
                'harga' => '80000'
            ],
            [
                'waktu'  => '1 bulan',
                'harga' => '60000'
            ],
            [
                'waktu'  => '2 bulan',
                'harga' => '60000'
            ],
            [
                'waktu'  => '3 bulan',
                'harga' => '60000'
            ]
        ]);
    }
}
