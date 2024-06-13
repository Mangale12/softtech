<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTrainingPhaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_training_phase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_person_id');
            $table->unsignedBigInteger('talim_id');
            $table->unsignedBigInteger('training_phase_id');
            $table->timestamps();

            $table->foreign('training_person_id')->references('id')->on('training_peoples')->onDelete('cascade');
            $table->foreign('talim_id')->references('id')->on('talims')->onDelete('cascade');
            $table->foreign('training_phase_id')->references('id')->on('training_phases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_training_phase');
    }
}
