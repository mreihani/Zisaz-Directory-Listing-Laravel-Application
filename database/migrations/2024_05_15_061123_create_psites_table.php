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
            $table->string('business_type')->nullable();
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_video_displayed')->default(0);
            $table->timestamps();
        });

        Schema::create('psite_hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_hero_id');
            $table->foreign('psite_hero_id')->references('id')->on('psite_heroes')->onDelete('cascade');
            $table->string('slider_image')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_about_us', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('about_us')->nullable();
            $table->text('licenses')->nullable();
            $table->text('contact_us')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('header_description')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_service_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_service_id');
            $table->foreign('psite_service_id')->references('id')->on('psite_services')->onDelete('cascade');
            $table->string('card_title')->nullable();
            $table->string('card_description')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_promotional_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('header_description')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('header_description')->nullable();

            $table->timestamps();
        });

        Schema::create('psite_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_id');
            $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            $table->boolean('is_hidden')->default(0);
            $table->string('header_description')->nullable();
            $table->timestamps();
        });

        Schema::create('psite_license_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psite_license_id');
            $table->foreign('psite_license_id')->references('id')->on('psite_licenses')->onDelete('cascade');
            $table->string('item_image')->nullable();
            $table->text('item_description')->nullable();
            $table->timestamps();
        });

        // Schema::create('psite_members', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_middle_banners', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_testimonials', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_blogs', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_trusted_customers', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_contact_us', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
        //     $table->boolean('is_hidden')->default(0);
            
        //     $table->timestamps();
        // });

        // Schema::create('psite_footers', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('psite_id');
        //     $table->foreign('psite_id')->references('id')->on('psites')->onDelete('cascade');
            
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('psite_footers');
        // Schema::dropIfExists('psite_contact_us');
        // Schema::dropIfExists('psite_trusted_customers');
        // Schema::dropIfExists('psite_blogs');
        // Schema::dropIfExists('psite_testimonials');
        // Schema::dropIfExists('psite_middle_banners');
        // Schema::dropIfExists('psite_members');
        Schema::dropIfExists('psite_license_items');
        Schema::dropIfExists('psite_licenses');
        Schema::dropIfExists('psite_projects');
        Schema::dropIfExists('psite_promotional_videos');
        Schema::dropIfExists('psite_service_items');
        Schema::dropIfExists('psite_services');
        Schema::dropIfExists('psite_about_us');
        Schema::dropIfExists('psite_hero_sliders');
        Schema::dropIfExists('psite_heroes');
        Schema::dropIfExists('psites');
    }
};
