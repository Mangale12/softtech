<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDamageRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('damage_records', function (Blueprint $table) {
            // Drop the old columns
            $table->dropColumn(['item_type']);

            // Add morphs to create the new columns
            $table->morphs('damagable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('damage_records', function (Blueprint $table) {
            // Reverse the migration by dropping the new columns
            $table->dropMorphs('damagable');

            // Re-add the old columns
            $table->enum('item_type', ['1', '2'])->nullable();
            $table->unsignedBigInteger('item_id');
        });
    }
}
