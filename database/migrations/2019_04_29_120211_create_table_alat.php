<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stasiun_id')->unsigned()->nullable();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('tipe');
            $table->string('merk');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('instansi');
            $table->string('alamat_instansi');
            $table->string('lingkungan');
            $table->string('orografi');
            $table->string('kepemilikan');
            $table->string('kondisi_alat');
            $table->string('pagar');
            $table->string('aktifitas');
            $table->string('sample_prakiraan');
            $table->string('dipasang_oleh')->nullable();
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
        Schema::dropIfExists('alats');
    }
}
