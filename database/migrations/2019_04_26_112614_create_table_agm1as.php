<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgm1as extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agm1as', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->unique();
            //jam i = 07.00
            $table->decimal('temp_bk_i', 5, 2)->nullable();
            $table->decimal('temp_bb_i', 5, 2)->nullable();
            $table->decimal('temp_rumput_i', 5, 2)->nullable();
            $table->decimal('lembab_nisbi_i', 5, 2)->nullable();
            $table->string('angin_kec_rata_i')->nullable();
            $table->decimal('angin_arah_i', 4, 1)->nullable();
            $table->string('angin_kec_i')->nullable();
            //jam ii = 14.00
            $table->decimal('temp_bk_ii', 5, 2)->nullable();
            $table->decimal('temp_bb_ii', 5, 2)->nullable();
            $table->decimal('temp_rumput_ii', 5, 2)->nullable();
            $table->decimal('lembab_nisbi_ii', 5, 2)->nullable();
            $table->string('angin_kec_rata_ii')->nullable();
            $table->decimal('angin_arah_ii', 4, 1)->nullable();
            $table->string('angin_kec_ii')->nullable();
            //jam iii = 18.00
            $table->decimal('temp_bk_iii', 5, 2)->nullable();
            $table->decimal('temp_bb_iii', 5, 2)->nullable();
            $table->decimal('temp_rumput_iii', 5, 2)->nullable();
            $table->decimal('lembab_nisbi_iii', 5, 2)->nullable();
            $table->string('angin_kec_rata_iii')->nullable();
            $table->decimal('angin_arah_iii', 4, 1)->nullable();
            $table->string('angin_kec_iii')->nullable();
            //Sinar Matahari
            $table->string('sinar_matahari')->nullable();
            $table->string('hujan')->nullable();
            $table->decimal('ujiper_bk_i', 5, 2)->nullable();
            $table->decimal('ujiper_min_i', 5, 2)->nullable();
            $table->decimal('ujiper_bk_ii', 5, 2)->nullable();
            $table->decimal('ujiper_max_ii', 5, 2)->nullable();
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
        Schema::dropIfExists('agm1as');
    }
}
