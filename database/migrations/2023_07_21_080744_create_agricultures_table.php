<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgriculturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agricultures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agricultural_id');
            $table->string('title')->nullable();
            $table->boolean('status')->default('1');
            $table->foreign('agricultural_id')->references('id')->on('agriculture_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('agricultures');
    }
}
