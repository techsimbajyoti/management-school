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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('father_profession')->nullable();
            $table->string('father_image');
            $table->string('email');
            $table->string('password');
            $table->string('guardian_name');
            $table->string('guardian_mobile');
            $table->string('guardian_profession');
            $table->string('guardian_image');
            $table->string('guardian_email');
            $table->string('guardian_address');
            $table->string('guardian_relation');
            $table->string('father_nationality');
            $table->string('office_number');
            $table->string('office_address');
            $table->string('applicant_id');
            $table->string('status');
            $table->string('applicant_status');
            $table->string('role_id');
            $table->string('ip_address');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
