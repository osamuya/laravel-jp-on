<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_premia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->text('description')->nullable();
            $table->integer('unit')->nullable();
            $table->integer('prize')->nullable();
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
        Schema::dropIfExists('mst_premia');
    }
}
