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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('project_type')->nullable();
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('review_status')->default(1);
            $table->enum('verify_status', ['verified', 'pending', 'rejected'])->default('pending');
            $table->text('reject_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('image_sm')->nullable();
            $table->timestamps();
        });

        Schema::create('project_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('total_area')->nullable();
            $table->string('floor_area')->nullable();
            $table->string('floor_count')->nullable();
            $table->text('constructor_bio')->nullable();
            $table->timestamps();
        });

        Schema::create('project_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('project_description')->nullable();
            $table->timestamps();
        });

        Schema::create('project_plan_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_facility_id');
            $table->foreign('project_facility_id')->references('id')->on('project_facilities')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('image_sm')->nullable();
            $table->timestamps();
        });

        Schema::create('welfare_facility_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('welfare_facility_id');
            $table->foreign('welfare_facility_id')->references('id')->on('welfare_facilities')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::create('project_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('city_id')->nullable();
            $table->string('project_address')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('eitaa')->nullable();
            $table->timestamps();
        });

        Schema::create('project_contact_phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_contact_id');
            $table->foreign('project_contact_id')->references('id')->on('project_contacts')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        Schema::create('project_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_job_id')->nullable();
            $table->string('video')->nullable();
            $table->string('video_job_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_videos');
        Schema::dropIfExists('project_contact_phones');
        Schema::dropIfExists('project_contacts');
        Schema::dropIfExists('welfare_facility_project');
        Schema::dropIfExists('project_plan_images');
        Schema::dropIfExists('project_facilities');
        Schema::dropIfExists('project_infos');
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
    }
};
