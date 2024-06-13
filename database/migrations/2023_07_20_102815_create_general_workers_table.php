<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_workers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('user_id')->nullable();
            $table->text('full_name')->nullable();
            $table->text('mobile')->nullable();
            $table->text('gender')->nullable();
            $table->text('worker_types')->nullable();
            $table->text('time')->nullable();
            $table->text('salary_type')->nullable();
            $table->text('salary')->nullable();
            $table->text('occupation')->nullable();
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
        Schema::dropIfExists('general_workers');
    }
}
