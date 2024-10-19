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
        Schema::create('event_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventContent',2000)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default(NULL);
            $table->string('photo',100)->nullable()->default(NULL);
            $table->unsignedInteger('event_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('event_id')->references('id')->on('event')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_content');
    }
};
