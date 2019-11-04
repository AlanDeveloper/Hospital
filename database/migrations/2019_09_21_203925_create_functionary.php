<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('functionary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('specialty');
            $table->string('office');
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
        Schema::dropIfExists('functionary');
    }
}
