<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talims', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('duration')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('description')->nullable();
            $table->text('trainer')->nullable();
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
        Schema::dropIfExists('talims');
    }
}
