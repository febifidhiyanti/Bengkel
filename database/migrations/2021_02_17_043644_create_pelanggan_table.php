<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->bigIncrements('id_pelanggan');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan')->nullable();
            $table->string('email_pelanggan');
            $table->string('pass_pelanggan');
            $table->string('no_telp_pelanggan',12)->nullable();
            $table->string('jk_pelanggan')->nullable();
            $table->string('foto_pelanggan')->nullable();
            $table->text('ket_pelanggan')->nullable();
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
        Schema::dropIfExists('pelanggan');
    }
}
