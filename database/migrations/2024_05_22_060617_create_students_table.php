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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no');
            $table->string('roll_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('email');
            $table->string('user_name');
            $table->string('password');
            $table->string('class');
            $table->string('section');
            $table->string('date_of_birth');
            $table->string('religion');
            $table->string('gender');
            $table->string('category');
            $table->string('blood_group');
            $table->string('admission_date');
            $table->string('image');
            $table->string('parent_name');
            $table->string('parent_mobile');
            $table->string('place_of_birth');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('pin_code');
            $table->string('student_language');
            $table->string('residance_address');
            $table->string('document');
            $table->string('parent_id');
            $table->string('applicant_id');
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
        Schema::dropIfExists('students');
    }
};
