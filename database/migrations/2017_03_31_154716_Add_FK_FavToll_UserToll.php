<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKFavTollUserToll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favtoll', function ( $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('tollplaza_id')->references('id')->on('tollplazas')->onDelete('cascade');            
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
