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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documentTitle',500)->nullable()->default(NULL);
            $table->string('documentDescription',1000)->nullable()->default(NULL);
            $table->string('department',50)->nullable()->default(NULL);
            $table->string('documentReference',200)->nullable()->default(NULL);
            $table->string('fileType',20)->nullable()->default(NULL);
            $table->string('ducumentCategory',30)->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default(NULL);
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
        Schema::dropIfExists('documents');
    }
};
