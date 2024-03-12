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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('shop_act_cats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('shop_act_grps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_act_cat_id');
            $table->foreign('shop_act_cat_id')->references('id')->on('shop_act_cats')->onDelete('cascade');
            $table->string('title');
        });

        Schema::create('profile_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_profile_id');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');
            $table->string('profile_image')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('birth_date')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_reg_num')->nullable();
            $table->unsignedBigInteger('shop_act_grps_id')->nullable();
            $table->timestamps();
        });

        Schema::create('profile_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_profile_id');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');
            $table->string('landline_telephone')->nullable();
            $table->string('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
        });

        Schema::create('profile_resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_profile_id');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_company_specs');
        Schema::dropIfExists('profile_resumes');
        Schema::dropIfExists('profile_contacts');
        Schema::dropIfExists('profile_infos');
        Schema::dropIfExists('shop_act_grps');
        Schema::dropIfExists('shop_act_cats');
        Schema::dropIfExists('contract_types');
        Schema::dropIfExists('user_profiles');
    }
};
