<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_position_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('day_of_joining')->nullable();
            $table->string('salary')->nullable();
            $table->string('bhatta')->nullable();
            $table->string('image')->nullable();
            $table->foreign('worker_position_id')->references('id')->on('worker_positions')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('worker_lists');
    }
}
