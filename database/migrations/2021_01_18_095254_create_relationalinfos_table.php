<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationalinfos', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->string('period_of_stay');
            $table->string('baptized');
            $table->string('berean_center');
            $table->string('tithe');
            $table->string('welfare');
            $table->string('ministry');
            $table->string('department');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('personalinfos')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationalinfos');
    }
}
