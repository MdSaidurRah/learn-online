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
        Schema::create('profile_links', function (Blueprint $table) {
            $table->id();
            $table->string('profileLink',200)->nullable()->default(NULL);
            $table->string('siteCategory',200)->nullable()->default(NULL);
            $table->string('siteName',100)->nullable()->default(NULL);
            $table->string('siteUrl',200)->nullable()->default(NULL);
            $table->string('order',1000)->nullable()->default(NULL);
            $table->string('status',10)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_links');
    }
};
