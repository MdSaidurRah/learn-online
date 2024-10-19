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
        Schema::create('important_links', function (Blueprint $table) {
            $table->id();
            $table->string('linkText',100)->nullable()->default(NULL);
            $table->string('referenceLink',200)->nullable()->default(NULL);
            $table->string('category',1000)->nullable()->default(NULL);
            $table->string('class',200)->nullable()->default(NULL);
            $table->string('order',100)->nullable()->default(NULL);
            $table->string('status',10)->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('important_links');
    }
};
