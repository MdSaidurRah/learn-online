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
        Schema::create('committee_member', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable()->default(NULL);
            $table->string('designation',100)->nullable()->default(NULL);
            $table->string('instituteName',100)->nullable()->default(NULL);
            $table->string('photograph',100)->nullable()->default("uploads/images/persons/dummy-person-photo.png");
            $table->string('position',100)->nullable()->default(NULL);
            $table->string('committeeName',100)->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default("ACTIVE");
            $table->integer('order')->nullable()->default(1000);
            $table->unsignedInteger('committee_id');
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('committee_id')->references('id')->on('management_committee')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committee_member');
    }
};
