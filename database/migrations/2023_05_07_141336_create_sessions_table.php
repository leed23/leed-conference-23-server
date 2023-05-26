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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->string('slug', 1000);
            $table->string('room', 50)->default('TBC');
            $table->string('session_format', 50);
            $table->time('start_time', $precision = 0);
            $table->time('end_time', $precision = 0);
            $table->date('session_date')->default('2023-06-14');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
