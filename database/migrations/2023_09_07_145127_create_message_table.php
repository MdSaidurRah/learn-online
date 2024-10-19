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
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('messageFrom',40)->nullable()->default(NULL);
            $table->string('message',3000)->nullable()->default(NULL);
            $table->string('messageBy',30)->nullable()->default(NULL);
            $table->string('designation',50)->nullable()->default(NULL);
            $table->string('organization',100)->nullable()->default(NULL);
            $table->string('messageDate',50)->nullable()->default(NULL);
            $table->string('messageCategory',20)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default("INACTIVE");
            $table->string('messengerPhoto',100)->nullable()->default(NULL);
            $table->string('signature',100)->nullable()->default(NULL);
            $table->string('type',20)->nullable()->default(NULL);
            $table->string('profileLink',100)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
