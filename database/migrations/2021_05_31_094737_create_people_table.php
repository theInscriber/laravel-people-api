<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('system_id');

            $table->string('name');
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female']);
            # The assumption is that the age retrieved from the API is relative to the year the request was sent
            # so to give accurate data we can calculate the age on the fly from the birth year and vice versa
            $table->date('birthdate');
            $table->double('height');
            $table->double('weight');
            $table->string('blood');
            $table->string('eye_color');

            $table->string('country');
            $table->string('city');
            $table->string('born_place');
            $table->string('born')->nullable();

            $table->string('cellphone');
            $table->string('national_code');
            $table->string('religion');

            $table->string('father_name');

            $table->string('avatar')->nullable();

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
        Schema::dropIfExists('people');
    }
}
