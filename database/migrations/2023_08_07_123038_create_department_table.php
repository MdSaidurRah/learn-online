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
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortName',10)->nullable()->default(NULL);
            $table->string('fullName',500)->nullable()->default(NULL);
            $table->string('shortDescription',1000)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default(NULL);
            $table->string('coverPhoto',100)->nullable()->default(NULL);
            $table->string('logo',100)->nullable()->default(NULL);
            $table->unsignedInteger('faculty_id');
            $table->string('siteLink',500)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('faculty_id')->references('id')->on('faculty')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department');
    }
};
