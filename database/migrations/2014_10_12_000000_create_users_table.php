<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->Increments('id');
            $table->integer('prefecture_id')->unsigned();
            $table->string('name', 30);
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20);
            $table->string('postcode', 8);
            $table->string('city', 24);
            $table->string('block', 64);
            $table->string('building');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('prefecture_id')
            //     ->references('id')
            //     ->on('prefectures')
            //     ->onDelete('cascade');
        });
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
