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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sessions_id');
            $table->unsignedBigInteger('child_sessions_id');
            $table->string('theme', 100);
            $table->timestamps();

            $table->foreign('sessions_id')
            ->references('id')
            ->on('sessions')
            ->delete('cascade')
            ->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
