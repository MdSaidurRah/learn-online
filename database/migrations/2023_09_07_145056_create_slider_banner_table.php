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
        Schema::create('slider_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bannerPhoto',100)->nullable()->default(NULL);
            $table->string('sliderTitle',200)->nullable()->default(NULL);
            $table->string('subTitle',500)->nullable()->default(NULL);
            $table->string('buttonTitle',40)->nullable()->default(NULL);
            $table->string('referenceUrl',100)->nullable()->default(NULL);
            $table->integer('sliderOrder')->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default("ACTIVE");
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
        Schema::dropIfExists('slider_banner');
    }
};
