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
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->string('financials_title')->nullable();
            $table->string('financials_subtitle')->nullable();
            $table->string('financials_bg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            
        });
    }
};
