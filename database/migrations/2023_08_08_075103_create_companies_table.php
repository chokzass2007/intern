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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('stuIdCreate')->nullable();
            $table->string('year')->nullable();
            $table->string('semester')->nullable();
            $table->string('company')->nullable();
            $table->string('bossName')->nullable();
            $table->string('positionName')->nullable();
            $table->string('address')->nullable();
            $table->date('start_intern')->nullable();
            $table->date('end_intern')->nullable();
            $table->string('status')->default('รออาจารย์อนุมัติ')->nullable();
            $table->string('cal_comment')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
