<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('psites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('review_status')->default(1);
            $table->enum('verify_status', ['verified', 'pending', 'rejected'])->default('pending');
            $table->text('reject_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('psite_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('about_us')->nullable();
            $table->string('logo')->nullable();
            $table->string('business_banner')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_contact_us', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('lt')->nullable();
            $table->string('ln')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('eitaa')->nullable();
            $table->timestamps();
        });
       
        Schema::create('psite_promotional_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_job_id')->nullable();
            $table->string('video')->nullable();
            $table->string('video_job_id')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->timestamps();
        });

        Schema::create('psite_license_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_license_id');
            $table->foreign('psite_license_id')->references('id')->on('psite_licenses')->onDelete('cascade');
            $table->string('item_image')->nullable();
            $table->string('item_image_sm')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->timestamps();
        });

        Schema::create('psite_member_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_member_id');
            $table->foreign('psite_member_id')->references('id')->on('psite_members')->onDelete('cascade');
            $table->string('item_fullname')->nullable();
            $table->string('item_role')->nullable();
            $table->string('item_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psite_member_items');
        Schema::dropIfExists('psite_members');
        Schema::dropIfExists('psite_license_items');
        Schema::dropIfExists('psite_licenses');
        Schema::dropIfExists('psite_promotional_videos');
        Schema::dropIfExists('psite_contact_us');
        Schema::dropIfExists('psite_infos');
        Schema::dropIfExists('psites');
    }
};
