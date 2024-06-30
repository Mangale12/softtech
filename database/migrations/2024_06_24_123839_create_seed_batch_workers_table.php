<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedBatchWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_batch_workers', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_wages');
            $table->decimal('wages_per_hour', 8, 2);
            $table->integer('worked_hour');
            $table->integer('worked_day');
            $table->foreignId('woaker_id')->constrained('worker_lists')->onDelete('cascade');
            $table->foreignId('seed_batch_id')->constrained('seed_batches')->onDelete('cascade');
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
        Schema::dropIfExists('seed_batch_workers');
    }
}
