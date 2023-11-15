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
        Schema::create('testimonial_industry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('testimonial_id');
            $table->unsignedBigInteger('industry_id');
            $table->timestamps();

            // $table->foreign('testimonial_id')->references('id')->on('case_studies')->onDelete('cascade');
            // $table->foreign('industry_id')->references('id')->on('industry')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_industry');
    }
};
