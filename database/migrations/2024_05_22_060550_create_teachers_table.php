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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('roles');
            $table->string('designations');
            $table->string('departments');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email');
            $table->string('password');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('joing_date');
            $table->string('phone');
            $table->string('marital_status');
            $table->string('image');
            $table->string('current_address');
            $table->string('parmanent_address');
            $table->string('basic_salary');
            $table->string('teacher_document');
            $table->string('status');
            $table->string('role_id');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
