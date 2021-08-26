<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_movies', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->timestamps();
            $table->tinyInteger('watched')->default(0);
            $table->tinyInteger('rated')->default(0);
            $table->bigInteger('rating')->nullable();
            
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
