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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->enum('type', ['auction', 'tender_buy', 'tender_project'])->default('auction');
            $table->enum('auctioneer', ['private_company', 'public_company', 'individual'])->default('private_company');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('auction_number')->nullable();
            $table->string('auction_exp_date_start')->nullable();
            $table->string('auction_exp_date_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
