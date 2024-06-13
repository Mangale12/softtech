<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('billing_id')->nullable();
            $table->unsignedBigInteger('udhyog_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total')->nullable();
            $table->foreign('billing_id')->references('id')->on('billings')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('udhyog_id')->references('id')->on('udhyogs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('billing_details');
    }
}
