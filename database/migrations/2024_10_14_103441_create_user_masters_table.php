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
        Schema::create('user_masters', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Email should have only unique values
            $table->string('password');
            $table->enum('role',['admin','student']); // Enumeration for roles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_masters');
    }
};
