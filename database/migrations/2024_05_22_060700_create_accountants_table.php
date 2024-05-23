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
        Schema::create('accountants', function (Blueprint $table) {
            $table->id();
            $table->string('accountant_role');
            $table->string('accountant_name');
            $table->string('accountant_mobile');
            $table->string('accountant_profession');
            $table->string('accountant_image');
            $table->string('email');
            $table->string('password');
            $table->string('accountant_address');
            $table->string('accountant_relation');
            $table->string('accountant_nationality');
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
        Schema::dropIfExists('accountants');
    }
};
