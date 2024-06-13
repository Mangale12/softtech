<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUdhyogAcharsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udhyog_achars', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('land_category');
            // $table->unsignedBigInteger('irrigation_category');
            // $table->unsignedBigInteger('fuel_category');
            // $table->unsignedBigInteger('equipment_category');
            // $table->unsignedBigInteger('store_category');

            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->date('expiry_date')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('image')->nullable();

            // $table->foreign('land_category')->references('id')->on('inventory_land_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('irrigation_category')->references('id')->on('inventory_irrigation_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('fuel_category')->references('id')->on('inventory_fuel_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('equipment_category')->references('id')->on('inventory_equipment_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('store_category')->references('id')->on('inventory_store_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('udhyog_achars');
    }
}
