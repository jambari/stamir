<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStasiun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stasiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_stasiun');
            $table->string('jenis_stasiun');
            $table->string('nomor_stasiun');
            $table->string('zom');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('nama_stasiun');
            $table->float('lintang');
            $table->float('bujur');
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
        Schema::dropIfExists('stasiuns');
    }
}
