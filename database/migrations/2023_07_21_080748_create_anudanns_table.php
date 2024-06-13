<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnudannsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anudanns', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('amount')->nullable();
            $table->string('bibran')->nullable();
            $table->string('times')->nullable();
            $table->string('criteria')->nullable();
            $table->string('daatrinikay_sahayog')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('anudanns');
    }
}
