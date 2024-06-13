<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->unsignedBigInteger('lekha_sirsak_id')->nullable();
            $table->string('type')->nullable();
            $table->string('dramount')->nullable();
            $table->string('cramount')->nullable();
            $table->string('totalcramt')->nullable();
            $table->string('totaldramt')->nullable();
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('lekha_sirsak_id')->references('id')->on('lekha_sirsaks')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('debit_credits');
    }
}
