<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('email')->unique();
            $table->string('staff_phone');
            $table->string('staff_address');
            $table->date('birthdate');
            $table->string('password')->default(Hash::make('12345678'));
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->string('staff_role');
            $table->string('role')->default('staff');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_staff');
    }
};
