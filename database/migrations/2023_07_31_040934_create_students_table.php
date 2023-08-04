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
            $table->string('code')->unique();
            $table->foreignId('guardian_id')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();

            $table->string('name');
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('birth_id')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('photo')->nullable();

            $table->string('status');
            $table->boolean('login_access')->default(0);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
