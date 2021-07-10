<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('perbaikan_id')->unsigned()->nullable();
            $table->foreign('perbaikan_id')->references('id_perbaikan')->on('perbaikan');
            $table->date('tanggal_perbaikan');
            $table->integer('jumlah_harga');
            $table->integer('kode');
            $table->string('status')->nullable();
            $table->string('status_antar')->nullable();
            $table->string('status_perbaikan')->nullable();
            $table->text('ket_pengajuan')->nullable();
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
        Schema::dropIfExists('pengajuan');
    }
}
