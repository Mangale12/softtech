<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_lists', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->unsignedBigInteger('land_id');
            $table->string('kita_no')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_palika')->nullable();
            $table->string('permanent_ward')->nullable();
            $table->string('ekai_id')->nullable();
            $table->string('totalbigaha')->nullable();
            $table->string('totalkattha')->nullable();
            $table->string('totaldhur')->nullable();
            $table->string('totalropani')->nullable();
            $table->string('totalaana')->nullable();
            $table->string('totalpaisa')->nullable();
            $table->string('totaldam')->nullable();
            $table->foreign('land_id')->references('id')->on('general_lands')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('land_lists');
    }
}
