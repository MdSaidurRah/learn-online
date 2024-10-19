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
        Schema::create('site_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',100)->nullable()->default(NULL);
            $table->string('designation',100)->nullable()->default(NULL);
            $table->string('workingInstitute',200)->nullable()->default(NULL);
            $table->string('message',1000)->nullable()->default(NULL);
            $table->string('photograph',100)->nullable()->default(NULL);
            $table->string('signature',100)->nullable()->default(NULL);
            $table->string('reference',100)->nullable()->default(NULL);
            $table->integer('order',)->nullable()->default(1000);
            $table->string('peopleType',50)->nullable()->default(NULL);
            $table->string('peopleStatus',50)->nullable()->default(NULL);
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
        Schema::dropIfExists('site_people');
    }
};
