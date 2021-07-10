<?php

use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Alat::insert([
            [
                'perlakuan'  => 'Membubut Lurus',
                'harga' => '200000'
            ],
            [
                'perlakuan'  => 'Membubut Alur',
                'harga' => '400000'
            ],
            [
                'perlakuan'  => 'Membubut Dalam',
                'harga' => '160000'
            ],
            [
                'perlakuan'  => 'Membuat Ulir',
                'harga' => '100000'
            ]
        ]);
    }
}
