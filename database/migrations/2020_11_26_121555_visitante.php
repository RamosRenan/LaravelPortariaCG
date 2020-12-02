<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criar ... 
        Schema::create('visitante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rg')->unique();
            $table->string('localdestino')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('period_into');
            $table->string('time_out');
            $table->string('path_picture');
            $table->text('obs')->nullable();
            $table->boolean('status')->nullable();

            $table->rememberToken();
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
        // create 
        Schema::dropIfExists('visitante');
    }
}
