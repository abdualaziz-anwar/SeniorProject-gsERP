<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Database table for properties.
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table-> id();
            // 
            $table-> string('p_id');
            $table-> string('name');
            $table-> string('image');
            $table-> string('description');
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
        Schema::dropIfExists('properties');
    }
}
