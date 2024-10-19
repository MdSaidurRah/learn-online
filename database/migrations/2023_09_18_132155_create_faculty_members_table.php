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
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('firstName',50)->nullable()->default(NULL);
            $table->string('lastName',50)->nullable()->default(NULL);
            $table->string('photo',100)->nullable()->default("uploads/images/persons/dummy-person-photo.png");
            $table->string('gender',100)->nullable()->default(NULL);
            $table->string('bloodGroup',10)->nullable()->default(NULL);
            $table->string('email',100)->nullable()->default(NULL);
            $table->string('designation',100)->nullable()->default(NULL);
            $table->string('contactNo',11)->nullable()->default(NULL);
            $table->string('shortJobDescription',1000)->nullable()->default(NULL);
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('faculty_id');
            $table->string('departmentName',100)->nullable()->default(NULL);
            $table->string('facultyName',100)->nullable()->default(NULL);
            $table->timestamp('joinDate')->nullable()->default(NULL);
            $table->timestamp('lastPromotionDate')->nullable()->default(NULL);
            $table->string('employmentType',50)->nullable()->default(NULL);
            $table->string('siteMembership',50)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default('ACTIVE');
            $table->integer('order')->nullable()->default(NULL);
            $table->string('accountValidity',50)->nullable()->default(NULL);
            $table->integer('createdBy')->nullable()->default(NULL);
            $table->integer('updatedBy')->nullable()->default(NULL);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
            $table->foreign('faculty_id')->references('id')->on('faculty')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('department')->onUpdate('cascade')->onDelete('cascade');
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_members');
    }
};
