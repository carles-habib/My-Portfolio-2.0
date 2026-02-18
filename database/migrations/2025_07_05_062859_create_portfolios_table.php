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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('portfolio_description');
            $table->string('category'); // UX/UI, Branding, Apps, etc.
            $table->string('client')->nullable();
            $table->date('start_date')->nullable();
            $table->string('designer')->nullable();
            $table->string('live_url')->nullable();
            $table->string('image_path');
            $table->string('thumbnail1')->nullable();
            $table->string('thumbnail2')->nullable();
            $table->string('thumbnail3')->nullable();
            $table->text('story');
            $table->text('approach');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
