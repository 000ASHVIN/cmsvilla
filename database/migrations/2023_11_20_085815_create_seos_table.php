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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->text('page')->nullable();
            $table->string('content_id')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('meta_image')->nullable();
            $table->text('facebook_title')->nullable();
            $table->longText('facebook_description')->nullable();
            $table->text('facebook_image')->nullable();
            $table->text('twitter_title')->nullable();
            $table->longText('twitter_description')->nullable();
            $table->text('twitter_image')->nullable();
            $table->text('key_words')->nullable();
            $table->text('meta_robots')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
