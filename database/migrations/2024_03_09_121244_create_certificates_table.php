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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('activity_type', ['ads_registration'])->default('ads_registration');
            $table->unsignedBigInteger('subactivity_id')->nullable();
            $table->string('subactivity_type')->nullable();
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

        Schema::create('activity_license_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->enum('license_type', ['eng_license', 'ocp_license', 'news_ads', 'business_license', 'bid_license', 'other'])->default('eng_license');
            $table->text('description')->nullable();
            $table->string('license_image')->nullable();
            $table->timestamps();
        });

        Schema::create('act_grp_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('act_grp_id');
            $table->foreign('act_grp_id')->references('id')->on('act_grps')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('sellings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->enum('type', ['selling'])->default('selling');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->enum('manufacturer', ['iran_overseas', 'iran', 'overseas'])->default('iran_overseas');
            $table->string('product_brand')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('lt')->nullable();
            $table->string('ln')->nullable();
            $table->string('price')->nullable();
            $table->boolean('price_by_agreement')->default(0);
            $table->timestamps();
        });

        Schema::create('ads_stat_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ads_stat_id');
            $table->foreign('ads_stat_id')->references('id')->on('ads_stats')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('paymnt_mtd_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paymnt_mtd_id');
            $table->foreign('paymnt_mtd_id')->references('id')->on('paymnt_mtds')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('ads_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('image_sm')->nullable();
            $table->timestamps();
        });

        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->enum('type', ['employee', 'employer'])->default('employee');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->string('age')->nullable();
            $table->enum('work_exp', ['noWorkExp', 'lessThanTwo', 'twoToFive', 'moreThanFive'])->default('noWorkExp');
            $table->text('work_exp_description')->nullable();
            $table->string('city_id')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        Schema::create('contract_type_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_type_id');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('province_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('academic_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_id');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('gender_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->enum('type', ['investor', 'invested'])->default('investor');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->string('investment_value')->nullable();
            $table->enum('return_time', ['6mo', '12mo', '18mo', '24mo', 'moreThanTwoYrs'])->default('6mo');
            $table->text('yearly_profit_percent')->nullable();
            $table->text('gauranteed_profit_percent')->nullable();
            $table->text('investment_bail')->nullable();
            $table->text('invested_academic')->nullable();
            $table->string('city_id')->nullable();
            $table->string('invested_city_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
        Schema::dropIfExists('gender_activity');
        Schema::dropIfExists('academic_activity');
        Schema::dropIfExists('province_activity');
        Schema::dropIfExists('contract_type_activity');
        Schema::dropIfExists('employments');
        Schema::dropIfExists('ads_images');
        Schema::dropIfExists('paymnt_mtd_activity');
        Schema::dropIfExists('ads_stat_activity');
        Schema::dropIfExists('sellings');
        Schema::dropIfExists('act_grp_activity');
        Schema::dropIfExists('activity_license_items');
        Schema::dropIfExists('activities');
    }
};
