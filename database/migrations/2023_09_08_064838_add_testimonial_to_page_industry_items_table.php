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
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->longText('testimonial_title')->nullable()->after('trusted_company_status');
            $table->longText('testimonial_subtitle')->nullable()->after('testimonial_title');
            $table->longText('testimonial_status')->nullable()->after('testimonial_subtitle');
            $table->longText('testimonial_bg')->nullable()->after('testimonial_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->dropColumn('testimonial_title');
            $table->dropColumn('testimonial_subtitle');
            $table->dropColumn('testimonial_status');
            $table->dropColumn('testimonial_bg');
        });
    }
};
