<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('book');
            $table->string('username');
            $table->date('reciving_date');
            $table->date('back_date');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
