<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryatalikaBibransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyatalika_bibrans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('title')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('complete_status')->nullable();
            $table->string('working_team')->nullable();
            $table->text('remarks')->nullable();
            $table->string('image')->nullable();
            $table->foreign('farm_id')->references('id')->on('farms')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('karyatalika_bibrans');
    }
}
