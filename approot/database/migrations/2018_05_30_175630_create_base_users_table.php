<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 128)->nullable();
          $table->string('password', 256)->nullable();
          $table->string('email')->nullable();
          $table->string('gender', 8)->nullable();
          $table->dateTimeTz('birth_date')->nullable();
          $table->string('family_name', 128)->nullable();
          $table->string('given_name', 128)->nullable();
          $table->string('family_name_kana', 128)->nullable();
          $table->string('given_name_kana', 128)->nullable();
          $table->string('tel', 128)->nullable();
          $table->string('uniqueid', 64)->nullable();
          $table->string('uniquehash', 64)->nullable();
          $table->rememberToken()->nullable();
          $table->longText('description')->nullable();
          $table->integer('role')->nullable();
          $table->integer('status')->nullable();
          $table->dateTimeTz('last_login')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('base_users');
    }
}
