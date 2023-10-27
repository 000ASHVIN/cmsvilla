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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->text('project_name')->nullable();
            $table->text('project_slug')->nullable();
            $table->text('project_content')->nullable();
            $table->text('project_content_short')->nullable();
            $table->text('project_start_date')->nullable();
            $table->text('project_end_date')->nullable();
            $table->text('project_client_name')->nullable();
            $table->text('project_client_company')->nullable();
            $table->text('project_client_comment')->nullable();
            $table->text('project_video')->nullable();
            $table->text('project_featured_photo')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};

