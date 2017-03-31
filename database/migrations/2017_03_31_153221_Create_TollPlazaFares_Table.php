<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTollPlazaFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tollplazafares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tollplaza_id')->unsigned();
            $table->string('vehicle_type');
            $table->string('fare');
            $table->smallInteger('status');
            $table->string('returnfare');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tollplazafares');
    }
}
