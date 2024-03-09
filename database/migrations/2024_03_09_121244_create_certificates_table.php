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
        Schema::create('profile_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_profile_id');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');
        });

        Schema::create('profile_license_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_license_id');
            $table->foreign('profile_license_id')->references('id')->on('profile_licenses')->onDelete('cascade');
            $table->enum('license_type', ['eng_license', 'ocp_license', 'news_ads', 'business_license', 'other'])->default('eng_license');
            $table->text('description')->nullable();
            $table->string('license_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_license_items');
        Schema::dropIfExists('profile_licenses');
    }
};
