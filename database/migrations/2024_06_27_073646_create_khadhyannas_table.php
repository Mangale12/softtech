<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhadhyannasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khadhyannas', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_cost', 8, 2);
            $table->text('details');
            $table->foreignId('seed_batch_id')->constrained('seed_batches')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
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
        Schema::dropIfExists('khadhyannas');
    }
}
