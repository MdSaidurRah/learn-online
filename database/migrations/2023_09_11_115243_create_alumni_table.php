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
        Schema::create('alumni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo',100)->nullable()->default(NULL);
            $table->string('firstName',50)->nullable()->default(NULL);
            $table->string('lastName',50)->nullable()->default(NULL);
            $table->string('designation',50)->nullable()->default(NULL);
            $table->string('organizationName',100)->nullable()->default(NULL);
            $table->integer('order')->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default("INACTIVE");
            $table->string('session',20)->nullable()->default(NULL);
            $table->string('department',40)->nullable()->default(NULL);
            $table->string('achievement',500)->nullable()->default(NULL);
            $table->string('profileLink',200)->nullable()->default(NULL);
            $table->unsignedInteger('department_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('department')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
