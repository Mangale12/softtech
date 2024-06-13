<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionBatchProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_batch_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('production_batch_id');
            $table->unsignedBigInteger('inventory_product_id');
            $table->integer('quantity_produced');
            $table->timestamps();

            $table->foreign('production_batch_id')->references('id')->on('production_batches')->onDelete('cascade');
            $table->foreign('inventory_product_id')->references('id')->on('inventory_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_batch_products');
    }
}
