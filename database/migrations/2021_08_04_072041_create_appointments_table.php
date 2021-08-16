<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->boolean('booking_status');
            $table->timestamps();
            $table->softDeletes();
            $table->double('price');
            $table->string('location');
            $table->double('longitude');
            $table->double('latitude');
            $table->date('date');
            $table->time('time');
             $table->integer('mother_id');
             $table->integer('midwife_id');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
