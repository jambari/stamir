<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTanahgundul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gunduls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->float('lima',5,2)->nullable();
            $table->float('sepuluh',5,2)->nullable();
            $table->float('duapuluh',5,2)->nullable();
            $table->float('limapuluh',5,2)->nullable();
            $table->float('seratus',5,2)->nullable();
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
        Schema::dropIfExists('gunduls');
    }
}
