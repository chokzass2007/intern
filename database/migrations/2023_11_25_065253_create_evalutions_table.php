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
        Schema::create('evalutions', function (Blueprint $table) {
            $table->id();
            $table->string('companyName')->nullable();
            $table->string('fNameAssessor')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('fNameStudent')->nullable();
            $table->string('idStudent')->nullable();
            $table->integer('A1')->nullable();
            $table->integer('A2')->nullable();
            $table->integer('A3')->nullable();
            $table->integer('A4')->nullable();
            $table->integer('B1')->nullable();
            $table->integer('B2')->nullable();
            $table->integer('B3')->nullable();
            $table->integer('B4')->nullable();
            $table->integer('C1')->nullable();
            $table->integer('C2')->nullable();
            $table->integer('C3')->nullable();
            $table->integer('D1')->nullable();
            $table->integer('D2')->nullable();
            $table->integer('D3')->nullable();
            $table->integer('E1')->nullable();
            $table->integer('E2')->nullable();
            $table->integer('E3')->nullable();
            $table->integer('F1')->nullable();
            $table->integer('F2')->nullable();
            $table->integer('F3')->nullable();
            $table->string('prominentPoint')->nullable();
            $table->string('improve')->nullable();
            $table->string('additionalComments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evalutions');
    }
};
