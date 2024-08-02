<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('post_unique_id');
            $table->string('slug', 100)->unique();
            $table->string('thumbs')->nullable();
            $table->text('description')->nullable();
            $table->text('course_content')->nullable();
            $table->boolean('status')->default('1');
            $table->boolean('featured')->default('0');
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->nullable()->default(1);
            $table->unsignedInteger('visit_no')->default(0);
            $table->json('faqs')->nullable(); // Field for FAQs
            $table->json('videos')->nullable(); // Field for videos
            $table->text('more_details')->nullable(); // Field for more details
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('blogs', function ($table) {
            $table->foreign('category_id')
                ->references('id')->on('blog_categories')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('blogs');
    }
}
