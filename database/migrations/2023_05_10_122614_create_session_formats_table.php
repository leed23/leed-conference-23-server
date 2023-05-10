<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_formats', function (Blueprint $table) {
            $table->id();
            $table->string('session_format');
            $table->unsignedBigInteger('sessions_id');
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_formats');
    }
}
