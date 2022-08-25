<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email');
                $table->tinyInteger('tafel');
                $table->tinyInteger('max_number_of_persons');
                $table->string('message');
                $table->date('date');
                $table->time('time');
                $table->timestamps();

                $table->foreign('tafel')->references('id')->on('tafel');
                $table->foreign('max_number_of_persons')->references('max_number_of_persons')->on('tafel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
