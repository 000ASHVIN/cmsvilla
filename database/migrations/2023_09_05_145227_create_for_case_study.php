<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->text('case_study_title')->nullable();
            $table->text('case_study_subtitle')->nullable();
            $table->text('case_study_status')->nullable();
        });

        DB::statement('
            CREATE TABLE `case_studies` (
                `id` bigint(20) UNSIGNED NOT NULL,
                `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL
            )
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
