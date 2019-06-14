<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemperaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperaturs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->decimal('bola_kering', 5, 2)->nullable();
            $table->decimal('bola_basah', 5, 2)->nullable();
            $table->decimal('rumput', 5, 2)->nullable();
            $table->string('jam');
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
        Schema::dropIfExists('temperaturs');
    }
}
