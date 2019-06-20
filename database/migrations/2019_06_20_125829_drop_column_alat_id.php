<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnAlatId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bolakerings', function (Blueprint $table) {
            $table->dropColumn('alat_id');
        });
        Schema::table('bolabasahs', function (Blueprint $table) {
            $table->dropColumn('alat_id');
        });
        Schema::table('dewpoints', function (Blueprint $table) {
            $table->dropColumn('alat_id');
        });
        Schema::table('humidities', function (Blueprint $table) {
            $table->dropColumn('alat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
