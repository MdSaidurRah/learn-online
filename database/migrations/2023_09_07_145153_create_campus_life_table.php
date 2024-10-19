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
        Schema::create('campus_life', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coverPhoto',100)->nullable()->default(NULL);
            $table->string('sliderTitle',200)->nullable()->default(NULL);
            $table->string('subTitle',500)->nullable()->default(NULL);
            $table->string('description',4000)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default("INACTIVE");
            $table->timestamp('eventDate')->nullable()->default(NULL);
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
        Schema::dropIfExists('campus_life');
    }
};
