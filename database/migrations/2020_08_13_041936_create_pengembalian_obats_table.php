<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembalianObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian_obats', function (Blueprint $table) {
            $table->bigIncrements('id_pengembalian');
            $table->dateTime('waktu_pengembalian');
            $table->integer('jumlah_terpakai');
            $table->string('alasan_pengembalian',100);
            $table->bigInteger('id_order')->unsigned();
            $table->foreign('id_order')->references('id_order')->on('order_obats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalian_obats');
    }
}
