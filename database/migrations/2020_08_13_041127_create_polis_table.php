<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polis', function (Blueprint $table) {
            $table->bigIncrements('id_poli');
            $table->string('nama_poli',100);
            $table->string('alamat',300);
            $table->string('akreditasi',10);
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polis');
    }
}
