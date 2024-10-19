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
        Schema::create('office_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('informationNote',100)->nullable()->default(NULL);
            $table->string('informationNoteType',200)->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default("ACTIVE");
            $table->unsignedInteger('office_id');
            $table->string('officeName',100)->nullable()->default("ACTIVE");
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->timestamps();
            $table->foreign('office_id')->references('id')->on('office')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_information');
    }
};
