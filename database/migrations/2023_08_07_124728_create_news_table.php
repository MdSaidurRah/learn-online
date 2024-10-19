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
        Schema::create('News', function (Blueprint $table) {
            $table->increments('id');
            $table->string('newsTitle',500)->nullable()->default(NULL);
            $table->string('newsSubtitle',1000)->nullable()->default(NULL);
            $table->string('newsDescription',3000)->nullable()->default(NULL);
            $table->string('department',50)->nullable()->default(NULL);
            $table->string('targetAudience',500)->nullable()->default(NULL);
            $table->timestamp('lifeTime')->nullable()->default(NULL);
            $table->string('coverPhoto',100)->nullable()->default("uploads/images/News/dummy-News-cover.jpg");
            $table->unsignedInteger('department_id');
            $table->string('status',20)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('department_id')->references('id')->on('department')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations..
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('News');
    }
};
