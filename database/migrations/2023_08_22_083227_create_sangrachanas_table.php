<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSangrachanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sangrachanas', function (Blueprint $table) {
            $table->id();
            $table->string('types')->nullable();
            $table->string('bottom')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('area')->nullable();
            $table->string('made_date')->nullable();
            $table->string('type_of_makeup')->nullable();
            $table->string('use_of')->nullable();
            $table->string('user')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('sangrachanas');
    }
}
