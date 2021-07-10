<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_detail_pengajuan');
            $table->unsignedBigInteger('perbaikan_id')->unsigned();
            $table->foreign('perbaikan_id')->references('id_perbaikan')->on('perbaikan');
            $table->unsignedBigInteger('pengajuan_id')->unsigned();
            $table->foreign('pengajuan_id')->references('id_pengajuan')->on('pengajuan');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            $table->text('ket_perbaikan')->nullable();
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
        Schema::dropIfExists('detail_pengajuan');
    }
}
