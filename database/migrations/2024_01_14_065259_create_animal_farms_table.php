<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_farms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('animan_cat_id')->nullable();
            $table->unsignedBigInteger('animal_id')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->string('title')->nullable();
            $table->string('start_month_id')->nullable();
            $table->string('end_month_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('added_by')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('animan_cat_id')->references('id')->on('animal_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('animal_id')->references('id')->on('animals')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('animal_farms');
    }
}
