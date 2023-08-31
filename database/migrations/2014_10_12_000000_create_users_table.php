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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('idStudent')->nullable();
            $table->timestamp('idStudent_verified_at')->nullable();
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();
            $table->string('sex')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('major')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_intern')->nullable();
            $table->date('start_intern')->nullable();
            $table->date('end_intern')->nullable();
            $table->enum('role',['teacher','agent','student'])->default('student')->nullable();
            $table->string('status')->default('รอดำเนินการยื่นเรื่องฝึกงาน')->nullable();
            $table->rememberToken();
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
