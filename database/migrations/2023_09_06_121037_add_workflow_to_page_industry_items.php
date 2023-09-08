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
            $table->string('workflow_title')->nullable();
            $table->string('workflow_subtitle')->nullable()->after('workflow_title');
            $table->longText('workflow_content')->nullable()->after('workflow_subtitle');
            $table->longText('workflow_status')->nullable()->after('workflow_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->dropColumn('workflow_title');
            $table->dropColumn('workflow_subtitle');
            $table->dropColumn('workflow_content');
            $table->dropColumn('workflow_status');

        });
    }
};
