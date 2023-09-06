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
        Schema::create('page_industry_items', function (Blueprint $table) {
            $table->id();
            $table->longText('special_title')->nullable();
            $table->longText('special_subtitle')->nullable();
            $table->longText('special_content')->nullable();
            $table->longText('special_btn_text')->nullable();
            $table->longText('special_btn_url')->nullable();
            $table->longText('special_yt_video')->nullable();
            $table->longText('special_bg')->nullable();
            $table->longText('special_video_bg')->nullable();
            $table->longText('special_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_industry_items');
    }
};
