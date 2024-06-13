<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name
            $table->text('description')->nullable(); // Description, nullable
            $table->string('image')->nullable(); // Description, nullable
            $table->decimal('price', 8, 2)->nullable(); // Price, nullable
            $table->integer('stock_quantity')->nullable(); // StockQuantity, nullable
            $table->foreignId('unit_id')->nullable()->constrained(); // UnitId (Foreign Key), nullable
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
        Schema::dropIfExists('inventory_products');
    }
}
