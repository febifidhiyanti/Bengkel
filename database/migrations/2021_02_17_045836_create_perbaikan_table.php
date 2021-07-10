<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbaikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id_perbaikan');
            $table->string('nama');
            $table->unsignedBigInteger('waktu_perbaikan_id');
            $table->unsignedBigInteger('alat_id');
            $table->unsignedBigInteger('bahan_perbaikan_id');
            $table->string('image')->nullable();
            $table->integer('jumlah_perbaikan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbaikan');
    }
}
