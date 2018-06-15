<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inf_wins', function (Blueprint $table) {
            $table->increments('premium_id');
            $table->integer('winning_probability')->nullable();
            $table->integer('winner_id')->nullable();
            $table->string('qrcode', 256)->nullable();
            $table->boolean('done');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('inf_wins');
    }
}
