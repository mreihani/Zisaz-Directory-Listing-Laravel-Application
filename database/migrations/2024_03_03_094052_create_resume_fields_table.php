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
        Schema::create('resume_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_resume_id');
            $table->foreign('profile_resume_id')->references('id')->on('profile_resumes')->onDelete('cascade');
            $table->string('payment_amount_from')->nullable();
            $table->string('payment_amount_to')->nullable();
            $table->boolean('is_payment_by_agreement')->default(false);
            $table->enum('payment_amount_type', ['monthly', 'hourly', 'weekly', 'annually'])->default('monthly');
            $table->timestamps();
        });

        Schema::create('city_resume_field', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('resume_field_id');
            $table->foreign('resume_field_id')->references('id')->on('resume_fields')->onDelete('cascade');
        });

        Schema::create('shop_act_grp_resume_field', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_act_grp_id');
            $table->foreign('shop_act_grp_id')->references('id')->on('shop_act_grps')->onDelete('cascade');
            $table->unsignedBigInteger('resume_field_id');
            $table->foreign('resume_field_id')->references('id')->on('resume_fields')->onDelete('cascade');
        });

        Schema::create('contract_type_resume_field', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_type_id');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onDelete('cascade');
            $table->unsignedBigInteger('resume_field_id');
            $table->foreign('resume_field_id')->references('id')->on('resume_fields')->onDelete('cascade');
        });

        Schema::create('resume_aca_bgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_resume_id');
            $table->foreign('profile_resume_id')->references('id')->on('profile_resumes')->onDelete('cascade');
            $table->boolean('relocate_for_interview')->default(false);
            $table->timestamps();
        });

        Schema::create('resume_aca_bg_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_aca_bg_id');
            $table->foreign('resume_aca_bg_id')->references('id')->on('resume_aca_bgs')->onDelete('cascade');
            $table->enum('academic_level', ['msd', 'hsd', 'ad', 'ba', 'ms', 'phd'])->default('msd');
            $table->string('field_of_study')->nullable();
            $table->timestamps();
        });

        Schema::create('resume_work_exps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_resume_id');
            $table->foreign('profile_resume_id')->references('id')->on('profile_resumes')->onDelete('cascade');
            $table->text('work_experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_work_exps');
        Schema::dropIfExists('resume_aca_bg_items');
        Schema::dropIfExists('resume_aca_bgs');
        Schema::dropIfExists('contract_type_resume_field');
        Schema::dropIfExists('shop_act_grp_resume_field');
        Schema::dropIfExists('city_resume_field');
        Schema::dropIfExists('resume_fields');
    }
};
