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
        Schema::create('admin_staff', function (Blueprint $table) {
                $table->increments('id');
                $table->string('firstName',50)->nullable()->default(NULL);
                $table->string('lastName',50)->nullable()->default(NULL);
                $table->string('photo',100)->nullable()->default("uploads/images/persons/dummy-person-photo.png");
                $table->string('gender',100)->nullable()->default(NULL);
                $table->string('bloodGroup',10)->nullable()->default(NULL);
                $table->string('email',100)->nullable()->default(NULL);
                $table->string('contactNo',11)->nullable()->default(NULL);
                $table->string('pabxNumber',10)->nullable()->default(NULL);
                $table->string('designation',100)->nullable()->default(NULL);
                $table->string('officeLocation',100)->nullable()->default(NULL);
                $table->string('deskNumber',20)->nullable()->default(NULL);
                $table->string('shortJobDescription',1000)->nullable()->default(NULL);
                $table->unsignedInteger('office_id');
                $table->string('officeName',100)->nullable()->default(NULL);
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
                $table->foreign('office_id')->references('id')->on('office')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_staff');
    }
};
