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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone');
            $table->boolean('phone_verified')->default(false);
            $table->boolean('account_status')->default(true);
            $table->boolean('two_factor_auth')->default(false);
            $table->enum('role', 
            [
                'admin',
                'senior_support',
                'support_level_one',
                'marketer',
                'editor',
                'real_estate_manager',
                'real_estate_agent',
                'construction'
            ])->default('construction');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('active_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('code');
            $table->unique(['user_id','code']);
            $table->timestamp('expired_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_codes');
        Schema::dropIfExists('users');
    }
};
