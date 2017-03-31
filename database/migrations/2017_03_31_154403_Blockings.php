<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blockings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('blocking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blocked_id')->unsigned();
            $table->foreign('blocked_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('blocked_by')->unsigned();
            $table->foreign('blocked_by')->references('id')->on('users')->onDelete('cascade');      
            $table->integer('blocked_vehicle')->unsigned();            
            $table->foreign('blocked_vehicle')->references('id')->on('vehicles')->onDelete('cascade');
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
       Schema::dropIfExists('blocking');        
        
    }
}
