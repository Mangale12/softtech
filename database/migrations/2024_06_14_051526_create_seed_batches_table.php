<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_batches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('seed_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->integer('quantity');
            $table->string('manufacturing_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            $table->text('land_area')->nullable();
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('set null');
            $table->foreign('seed_id')->references('id')->on('seeds')->onDelete('set null');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
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
        Schema::dropIfExists('seed_batches');
    }
}
