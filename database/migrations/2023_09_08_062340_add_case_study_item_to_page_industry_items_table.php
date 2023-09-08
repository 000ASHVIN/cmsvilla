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
            $table->string('case_study_title')->nullable()->after('workflow_status');
            $table->string('case_study_subtitle')->nullable()->after('case_study_title');
            $table->longText('case_study_status')->nullable()->after('case_study_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->dropColumn('case_study_title');
            $table->dropColumn('case_study_subtitle');
            $table->dropColumn('case_study_status');
        });
    }
};
