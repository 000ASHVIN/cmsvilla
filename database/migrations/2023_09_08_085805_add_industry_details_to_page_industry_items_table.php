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
            $table->string('industry_title')->nullable();
            $table->string('industry_subtitle')->nullable()->after('industry_title');
            $table->longText('industry_content')->nullable()->after('industry_subtitle');
            $table->longText('industry_status')->nullable()->after('industry_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->dropColumn('industry_title');
            $table->dropColumn('industry_subtitle');
            $table->dropColumn('industry_content');
            $table->dropColumn('industry_status');
        });
    }
};
