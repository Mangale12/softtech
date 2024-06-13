<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('damage_records', function (Blueprint $table) {
        $table->id();
        $table->enum('item_type', ['1', '2'])->nullable();// 1 for RawMaterial, 2 for Product
        $table->integer('quantity_damaged')->nullable();
        $table->unsignedBigInteger('damage_type_id')->nullable();
        $table->date('damage_date')->nullable();
        $table->string('reported_by', 100)->nullable();
        $table->text('action_taken')->nullable();
        $table->text('notes')->nullable();
        $table->bigInteger('total_damage')->nullable();
        $table->timestamps();

        // Assuming you have RawMaterials and Products tables
        // $table->foreign('item_id')->references('id')->on('raw_materials')->onDelete('cascade');
        // $table->foreign('item_id')->references('id')->on('inventory_products')->onDelete('cascade');
        $table->foreign('damage_type_id')->references('id')->on('damage_types')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('damage_records');
    }
}
