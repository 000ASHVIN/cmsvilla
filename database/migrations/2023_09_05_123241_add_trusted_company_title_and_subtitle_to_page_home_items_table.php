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
            $table->longText('trusted_company_title')->nullable()->after('why_choose_status');
            $table->longText('trusted_company_subtitle')->nullable()->after('trusted_company_title');
            $table->longText('trusted_company_status')->nullable()->after('trusted_company_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->dropColumn('trusted_company_title');
            $table->dropColumn('trusted_company_subtitle');
            $table->dropColumn('trusted_company_status');
        });
    }
};
