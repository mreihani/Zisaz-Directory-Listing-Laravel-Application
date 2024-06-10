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
            $table->string('profile_image')->nullable();
            $table->text('bio')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('eitaa')->nullable();
        });

        Schema::create('act_cats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('act_grps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('act_cat_id');
            $table->foreign('act_cat_id')->references('id')->on('act_cats')->onDelete('cascade');
            $table->string('title');
        });

        Schema::create('paymnt_mtds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('ads_stats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genders');
        Schema::dropIfExists('academics');
        Schema::dropIfExists('contract_types');
        Schema::dropIfExists('ads_stats');
        Schema::dropIfExists('paymnt_mtds');
        Schema::dropIfExists('act_grps');
        Schema::dropIfExists('act_cats');
        Schema::dropIfExists('user_profiles');
    }
};
