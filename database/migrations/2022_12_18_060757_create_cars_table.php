<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('details');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('types');
            $table->unsignedBigInteger('manufacturer');
            $table->foreign('manufacturer')->references('id')->on('manufacturers');
            $table->unsignedBigInteger('color');
            $table->foreign('color')->references('id')->on('colors');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('cars');
    }
}
