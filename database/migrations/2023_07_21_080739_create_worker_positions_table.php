<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('position')->nullable();
            $table->string('bhatta')->nullable();
            $table->boolean('status')->default('1');
            $table->string('added_by')->nullable();
            $table->foreign('worker_id')->references('id')->on('worker_types')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('worker_positions');
    }
}
