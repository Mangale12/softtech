<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_levels', function (Blueprint $table) {
            $table->id();
            $table->string('local_level_id',4)->unique();
            $table->string('govt_level_id',1)->nullable();
            $table->string('province_id',3)->nullable();
            $table->string('local_govt_type_id',1)->nullable();
            $table->string('local_id',5)->nullable();
            $table->string('local_name',150)->nullable();
            $table->string('local_name_eng')->nullable();
            $table->string('dist_id',2)->nullable();
            $table->string('ward')->nullable();
            $table->string('new_province_id',1)->nullable();
            $table->string('new_dist_id',3)->nullable();
            $table->string('new_local_id',5)->nullable();
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
        Schema::dropIfExists('local_levels');
    }
}
