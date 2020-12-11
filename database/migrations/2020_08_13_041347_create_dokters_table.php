<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->bigIncrements('id_dokter');
            $table->string('nama_dokter',100);
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('alamat',200);
            $table->string('notelp',200);
            $table->enum('jenis_dokter',['umum','spesialis']);
            $table->string('spesialisasi',200)->nullable();
            $table->bigInteger('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete("cascade");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
