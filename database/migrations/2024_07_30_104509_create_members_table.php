<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->json('profile')->nullable();
            $table->json('legal_documents')->nullable();
            $table->json('company')->nullable();
            $table->json('social')->nullable();
            $table->json('footer')->nullable();
            $table->string('member_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('about_us')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->boolean('is_mail_send')->default(0);
            $table->string('member_posts')->nullable();
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
        Schema::dropIfExists('members');
    }
}
