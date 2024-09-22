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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->enum('type', ['contractor'])->default('contractor');
            $table->text('website_address')->nullable();
            $table->text('whatsapp_address')->nullable();
            $table->text('telegram_address')->nullable();
            $table->text('eitaa_address')->nullable();
            $table->string('price')->nullable();
            $table->boolean('price_by_agreement')->default(0);
            $table->boolean('ads_have_discount')->default(0);
            $table->foreign('city_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors');
    }
};
