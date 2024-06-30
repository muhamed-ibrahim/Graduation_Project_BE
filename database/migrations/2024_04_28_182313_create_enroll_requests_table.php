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
        Schema::create('enroll_requests', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->bigInteger('student_national_id')->nullable();
            $table->string('nationality');
            $table->string('image')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('state');
            $table->string('country');
            $table->string('childbirth_certificate')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enroll_requests');
    }
};
