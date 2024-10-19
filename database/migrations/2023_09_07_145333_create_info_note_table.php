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
        Schema::create('info_note', function (Blueprint $table) {
            $table->increments('id');
            $table->string('infoName',100)->nullable()->default(NULL);
            $table->string('infoValue',500)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default("INACTIVE");
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
        Schema::dropIfExists('info_note');
    }
};
