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
            $table->string('how_help_bg')->nullable();
            $table->string('how_help_title')->nullable()->after('how_help_bg');
            $table->text('how_help_subtitle')->nullable()->after('how_help_title');
            $table->string('how_help_status')->nullable()->after('how_help_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_industry_items', function (Blueprint $table) {
            $table->dropColumn('how_help_bg');
            $table->dropColumn('how_help_title');
            $table->dropColumn('how_help_subtitle');
            $table->dropColumn('how_help_status');

        });
    }
};
