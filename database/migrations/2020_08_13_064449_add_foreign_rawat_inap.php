<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignRawatInap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->bigInteger('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->bigInteger('id_dokter')->unsigned();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            $table->bigInteger('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
