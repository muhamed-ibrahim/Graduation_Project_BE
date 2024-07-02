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
            $table->string('name');
            $table->string('nationality');
            $table->bigInteger('national_id');
            $table->string('image')->nullable();
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('childbirth_certificate')->nullable();
            $table->string('level');
            $table->foreignId('parent_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
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
