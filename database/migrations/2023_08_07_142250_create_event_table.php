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
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventTitle',500)->nullable()->default(NULL);
            $table->string('eventSubtitle',1000)->nullable()->default(NULL);
            $table->string('eventDescription',3000)->nullable()->default(NULL);
            $table->string('eventCategory',20)->nullable()->default(NULL);
            $table->string('department',50)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default(NULL);
            $table->string('targetAudience',500)->nullable()->default(NULL);
            $table->timestamp('lifeTime')->nullable()->default(NULL);
            $table->string('coverPhoto',100)->nullable()->default(NULL);
            $table->unsignedInteger('department_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('department_id')->references('id')->on('department')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
