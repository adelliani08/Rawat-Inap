<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->bigIncrements('id_kamar');
            $table->string('nama_kamar', 100);
            $table->integer('jumlah_kasur');
            $table->string('harga_kamar',100);
            $table->integer('kasur_terisi')->default(0);
            $table->string('fasilitas', 100);
            $table->enum("kelas", ["VIP", "IV", "III", "II", "I"]);
            $table->bigInteger('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangs');
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
        Schema::dropIfExists('kamars');
    }
}
