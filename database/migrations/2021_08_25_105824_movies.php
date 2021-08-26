<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class Movies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('movie_id', 100)->unique()->default(0);
            $table->bigInteger('watched')->default(0);
            $table->bigInteger('watchlists')->default(0);
            $table->string('title', 500);
            $table->bigInteger('rating')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
}
