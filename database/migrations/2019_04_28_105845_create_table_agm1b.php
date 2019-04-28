<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgm1b extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agm1bs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->unique();
            //Tanah Gundul jam I =  gundul
            $table->string('gundul_i_5cm')->nullable();
            $table->string('gundul_i_10cm')->nullable();
            $table->string('gundul_i_20cm')->nullable();
            //Tanah Gundul jam II
            $table->string('gundul_ii_5cm')->nullable();
            $table->string('gundul_ii_10cm')->nullable();
            $table->string('gundul_ii_20cm')->nullable();
            //Tanah Gundul jam III
            $table->string('gundul_iii_5cm')->nullable();
            $table->string('gundul_iii_10cm')->nullable();
            $table->string('gundul_iii_20cm')->nullable();
            $table->string('gundul_iii_50cm')->nullable();
            $table->string('gundul_iii_100cm')->nullable();
            //Tanah Berumput jam I =  Berumput
            $table->string('berumput_i_5cm')->nullable();
            $table->string('berumput_i_10cm')->nullable();
            $table->string('berumput_i_20cm')->nullable();
            //Tanah berumput jam II
            $table->string('berumput_ii_5cm')->nullable();
            $table->string('berumput_ii_10cm')->nullable();
            $table->string('berumput_ii_20cm')->nullable();
            //Tanah berumput jam III
            $table->string('berumput_iii_5cm')->nullable();
            $table->string('berumput_iii_10cm')->nullable();
            $table->string('berumput_iii_20cm')->nullable();
            $table->string('berumput_iii_50cm')->nullable();
            $table->string('berumput_iii_100cm')->nullable();
            //keterangan
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('agm1bs');
    }
}
