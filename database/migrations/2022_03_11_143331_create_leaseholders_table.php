<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaseholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaseholders', function (Blueprint $table) {
            $table->id();

            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('national_id');
            $table->string('phone_no');
            $table->string('duration_of');

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
        Schema::dropIfExists('leaseholders');
    }
}
