<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedBatchProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_batch_productions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seed_id')->nullable();
            $table->unsignedBigInteger('seed_batch_id')->nullable();
            $table->integer('quantity');
            $table->foreign('seed_id')->references('id')->on('seeds')->onDelete('set null');
            $table->foreign('seed_batch_id')->references('id')->on('seed_batches')->onDelete('cascade');
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
        Schema::dropIfExists('seed_batch_productions');
    }
}
