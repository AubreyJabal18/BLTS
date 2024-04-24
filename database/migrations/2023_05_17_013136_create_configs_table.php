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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('municipality')->nullable();
            $table->string('barangay')->nullable();
            $table->string('logo')->nullable();
            $table->foreignId('current_term')->nullable();
            $table->boolean('first_time');
            $table->timestamps();
            $table->string('username')->unique();
            $table->string('password')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
