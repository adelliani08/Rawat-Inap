<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->bigIncrements('id_obat');
            $table->string('nama_obat',100);
            $table->enum('kategori',['sirup','kapsul','tablet']);
            $table->string('harga_obat',100);
            $table->bigInteger('id_poli')->unsigned()->nullable();
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
        Schema::dropIfExists('obats');
    }
}
