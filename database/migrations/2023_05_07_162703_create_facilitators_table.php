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
            $table->timestamps();
        });

        Schema::create('sessions_facilitators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sessions_id');
            $table->unsignedBigInteger('facilitators_id');
            $table->timestamps();

            $table->unique(['sessions_id', 'facilitators_id']);

            $table->foreign('sessions_id')
            ->references('id')
            ->on('sessions')
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
