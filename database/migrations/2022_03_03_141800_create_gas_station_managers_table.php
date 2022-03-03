<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasStationManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_station_managers', function (Blueprint $table) {
            $table->id();
            // 
            $table->string('fname');
            $table->string('lname');
            $table->string('phone_no');
            $table->string('national_id');
            $table->string('password');
            $table->string('email');
            $table->string('g_id');
            // 
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
        Schema::dropIfExists('gas_station_managers');
    }
}
