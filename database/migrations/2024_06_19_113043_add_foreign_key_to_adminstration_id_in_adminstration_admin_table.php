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
        Schema::table('adminstration_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('adminstration_id')->change();
            $table->foreign('adminstration_id')->references('id')->on('adminstrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adminstration_admin', function (Blueprint $table) {
            //
        });
    }
};
