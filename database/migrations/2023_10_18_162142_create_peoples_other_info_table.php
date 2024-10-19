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
        Schema::create('peoples_other_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info_key',500)->nullable()->default(NULL);
            $table->string('information',1000)->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default(NULL);
            $table->unsignedInteger('parent_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peoples_other_info');
    }
};
