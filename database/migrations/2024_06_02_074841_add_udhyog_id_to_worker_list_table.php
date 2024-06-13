<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUdhyogIdToWorkerListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worker_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('udhyog_id')->nullable()->after('id');
            $table->foreign('udhyog_id')->references('id')->on('udhyogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worker_lists', function (Blueprint $table) {
            //
        });
    }
}
