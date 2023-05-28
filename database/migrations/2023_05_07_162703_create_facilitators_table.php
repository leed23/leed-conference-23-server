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
        Schema::create('facilitators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 300);
            $table->timestamps();
        });

        Schema::create('child_sessions_facilitators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_sessions_id');
            $table->unsignedBigInteger('facilitators_id');
            $table->timestamps();

            $table->foreign('child_sessions_id')
            ->references('id')
            ->on('child_sessions')
            ->delete('cascade')
            ->update('cascade');

            $table->foreign('facilitators_id')
            ->references('id')
            ->on('facilitators')
            ->delete('cascade')
            ->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilitators');
    }
};
