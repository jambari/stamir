<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        //create user for the app
        DB::table('users')->insert([
            ['name' => 'emon', 'email' => 'emon.syatauw@gmail.com', 'password' => bcrypt('stamir2123')],
            ['name' => 'sulaiman', 'email' => 'bmkg.sulaiman@gmail.com', 'password' => bcrypt('stamir1123')],
            ['name' => 'jambari', 'email' => 'hydrolunas7@gmail.com', 'password' => bcrypt('stamir3123')],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
