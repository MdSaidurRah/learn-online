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
        Schema::create('faculty_others', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('year',)->nullable()->default(NULL);
            $table->string('keywords',1000)->nullable()->default(NULL);
            $table->string('information',3000)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default(NULL);
            $table->unsignedInteger('faculty_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('faculty_id')->references('id')->on('faculty_members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_others');
    }
};
