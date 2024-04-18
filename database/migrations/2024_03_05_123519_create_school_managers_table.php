<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_managers', function (Blueprint $table) {
            $table->id();
            $table->string('manager_name');
            $table->string('email')->unique();
            $table->string('manager_phone');
            $table->string('manager_address');
            $table->string('password')->default(Hash::make('12345678'));
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_managers');
    }
};
