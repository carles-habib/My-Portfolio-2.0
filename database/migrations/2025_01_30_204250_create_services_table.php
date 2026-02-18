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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('brief');
            $table->longText('desc1');
            $table->longText('desc2');
            $table->longText('desc3');
            $table->string('process');
            $table->longText('processdesc');
            $table->string('objective1');
            $table->string('objective2');
            $table->string('objective3')->nullable();
            $table->string('objective4')->nullable();
            $table->string('objective5')->nullable();
            $table->string('objective6')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
