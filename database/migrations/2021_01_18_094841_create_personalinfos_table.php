<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profileImg')->nullable();
            $table->string('title');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('dob');
            $table->string('address');
            $table->string('hometown');
            $table->string('age');
            $table->string('status');
            $table->string('employmentstat');
            $table->string('occupation');
            $table->string('profession');
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
        Schema::dropIfExists('personalinfos');
    }
}
