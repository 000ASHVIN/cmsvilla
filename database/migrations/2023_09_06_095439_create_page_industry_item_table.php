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
            $table->longText('need_title')->nullable();
            $table->longText('need_subtitle')->nullable();
            $table->longText('need_content')->nullable();
            $table->longText('need_btn_text')->nullable();
            $table->longText('need_btn_url')->nullable();
            $table->longText('need_yt_video')->nullable();
            $table->longText('need_video_bg')->nullable();
            $table->longText('need_status')->nullable();
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
