<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Program name
            $table->text('description')->nullable(); // Program description
            $table->string('start_date')->nullable(); // Start date
            $table->string('end_date')->nullable(); // End date (nullable)
            $table->string('location')->nullable(); // Location of the event (nullable)
            $table->string('organizer_name')->nullable(); // Organizer name (nullable)
            $table->string('organizer_email')->nullable(); // Organizer email (nullable)
            $table->integer('capacity')->nullable(); // Maximum number of attendees (nullable)
            $table->decimal('price', 8, 2)->nullable(); // Event price (nullable)
            $table->longText('person_details')->nullable(); // Event price (nullable)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
