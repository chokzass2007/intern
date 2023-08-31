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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('auth_id')->nullable();
            $table->string('com_id')->nullable();
            $table->string('report_comment')->nullable();
            $table->string('report_from_date')->nullable();
            $table->string('report_to_date')->nullable();
            $table->string('dir_comment')->nullable();
            $table->integer('i_amOk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
