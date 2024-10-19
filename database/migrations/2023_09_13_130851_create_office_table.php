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
        Schema::create('office', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortName',50)->nullable()->default(NULL);
            $table->string('fullName',150)->nullable()->default(NULL);
            $table->string('shortDescription',1000)->nullable()->default(NULL);
            $table->string('directorName',100)->nullable()->default(NULL);
            $table->string('officeEmail',100)->nullable()->default(NULL);
            $table->string('section',50)->nullable()->default(NULL);
            $table->string('coverPhoto',200)->nullable()->default(NULL);
            $table->string('logo',200)->nullable()->default(NULL);
            $table->integer('order')->nullable()->default(NULL);
            $table->string('siteLink',500)->nullable()->default(NULL);
            $table->string('service',1000)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default("ACTIVE");
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
        Schema::dropIfExists('setup');
    }
};
