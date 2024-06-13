<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->decimal('total_cr', 15, 2)->nullable();
            $table->decimal('total_dr', 15, 2)->nullable();
            $table->unsignedBigInteger('lekha_shirshak')->nullable();
            $table->foreign('lekha_shirshak')->references('id')->on('lekha_sirsaks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            //
        });
    }
}
