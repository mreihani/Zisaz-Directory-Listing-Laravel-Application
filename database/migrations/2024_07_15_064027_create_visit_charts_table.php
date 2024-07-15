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
        Schema::create('visit_charts', function (Blueprint $table) {
            $table->id();
            $table->string("visits_date")->nullable();
            $table->string("iran_visits_count")->nullable();
            $table->string("iran_unique_visits_count")->nullable();
            $table->string("global_visits_count")->nullable();
            $table->string("global_unique_visits_count")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_charts');
    }
};
