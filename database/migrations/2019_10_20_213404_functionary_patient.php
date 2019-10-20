<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FunctionaryPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functionary_patient', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned();
            $table->integer('functionary_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patient')
                ->onDelete('cascade');
            $table->foreign('functionary_id')
                ->references('id')->on('functionary')
                ->onDelete('cascade');
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
