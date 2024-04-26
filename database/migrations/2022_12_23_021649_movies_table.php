<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('genre')->nullable();
            $table->foreignID('actors_id');
            $table->foreign('actors_id')->references('id')->on('actors')->onDelete('cascade');
            $table->string('director');
            $table->date('release_date')->nullable();
            $table->string('image_url');
            $table->string('background_url')->nullable();
            $table->integer('watchlist_count');
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
