<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->unsignedBigInteger('new_farm_id')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->string('block_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('land_id')->nullable();
            $table->string('baali_cat')->nullable();
            $table->string('baali')->nullable();
            $table->string('start_month_id')->nullable();
            $table->string('end_month_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('biubijan_detail')->nullable();
            $table->text('total_biubijan_amount')->nullable();
            $table->text('mesinary_detail')->nullable();
            $table->text('total_mesinary_amount')->nullable();
            $table->text('mal_bibran_detail')->nullable();
            $table->text('total_mal_bibran_amount')->nullable();
            $table->text('worker_detail')->nullable();
            $table->text('schedule_detail')->nullable();
            $table->string('added_by')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('profile_id')->references('id')->on('general_profiles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('new_farm_id')->references('id')->on('new_farms')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('farms');
    }
}
