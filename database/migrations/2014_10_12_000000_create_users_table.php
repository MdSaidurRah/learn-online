<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new
class extends Migration
{

    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName',25)->nullable()->default(NULL);
            $table->string('lastName',25)->nullable()->default(NULL);
            $table->string('userEmail',35)->nullable()->default(NULL);
            $table->string('userContactNo',15)->nullable()->default(NULL);
            $table->string('userPassword',100)->nullable()->default(NULL);
            $table->string('userRole',20)->nullable()->default(NULL);
            $table->string('designation',100)->nullable()->default(NULL);
            $table->string('department',20)->nullable()->default(NULL);
            $table->string('userType',20)->nullable()->default(NULL);
            $table->string('userStatus',15)->nullable()->default("INACTIVE");
            $table->date('joinDate')->nullable()->default(NULL);
            $table->string('userPhoto',500)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

};

