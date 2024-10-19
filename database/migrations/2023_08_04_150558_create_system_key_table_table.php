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
        Schema::create('system_key_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('infoKeyName',100)->nullable()->default(NULL);
            $table->string('infoKeyValue',1000)->nullable()->default(NULL);
            $table->string('infoKeyStatus',25)->nullable()->default("Active");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_key_table');
    }
};
