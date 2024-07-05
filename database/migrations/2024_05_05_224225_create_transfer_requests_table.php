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
        Schema::create('transfer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('student_national_id')->nullable();
            $table->string('nationality');
            $table->string('image')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('address');
            $table->string('religion')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('childbirth_certificate')->nullable();
            $table->foreignId('parent_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('old_school')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('new_school')->constrained('schools')->cascadeOnDelete();
            $table->integer('status')->default(-1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_requests');
    }
};
