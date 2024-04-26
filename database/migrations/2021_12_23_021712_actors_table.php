<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
        $table->id();
        $table->string('Name');
        $table->string('Gender');
        $table->string('Biography');
        $table->date('DateOfBirth')->nullable();
        $table->string('PlaceOfBirth');
        $table->string('image_url');
        $table->float('popularity');
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
