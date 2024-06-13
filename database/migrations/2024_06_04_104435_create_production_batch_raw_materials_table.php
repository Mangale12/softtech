<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionBatchRawMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('production_batch_raw_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('production_batch_id');
            $table->foreign('production_batch_id')->references('id')->on('production_batches')->onDelete('cascade');

            $table->unsignedBigInteger('raw_material_id');
            $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('cascade');
            // Add any additional columns for the pivot table here, such as quantity
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('production_batch_raw_materials');
    }
}
