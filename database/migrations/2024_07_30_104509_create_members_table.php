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
            $table->unsignedBigInteger('member_type_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('member_type_id')->references('id')->on('member_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_founded_year')->nullable();
            $table->string('pan')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('register_no')->nullable();
            $table->string('register_file')->nullable();
            $table->string('tax_clearance')->nullable();
            $table->softDeletes();
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
