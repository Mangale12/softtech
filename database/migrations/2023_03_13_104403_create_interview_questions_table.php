<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('post_unique_id');
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->boolean('status')->default('0');
            $table->integer('order')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
        });

        Schema::table('interview_questions', function($table){
            $table->foreign('category_id')
                    ->references('id')->on('interview_types')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_questions');
    }
}
