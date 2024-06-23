<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_product_id')->constrained()->onDelete('cascade')->nullable(); // ProductID (Foreign Key)
            $table->date('production_date')->nullable(); // ProductionDate
            $table->integer('quantity_produced')->nullable(); // QuantityProduced
            $table->json('raw_materials_used')->nullable(); // RawMaterialsUsed (JSON)
            $table->date('expiry_date')->nullable(); // ExpiryDate
            $table->string('batch_no')->nullable(); // ExpiryDate

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
        Schema::dropIfExists('production_batches');
    }
}
