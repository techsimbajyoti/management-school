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
        Schema::create('applicant_status', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('parent_id');
            $table->string('applicant_id');
            $table->string('status');
            $table->string('note');
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
        Schema::dropIfExists('applicant_status');
    }
};
