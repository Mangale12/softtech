<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiuBijansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biu_bijans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('qty')->nullable();
            $table->string('anudaan')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('biu_bijans');
    }
}
