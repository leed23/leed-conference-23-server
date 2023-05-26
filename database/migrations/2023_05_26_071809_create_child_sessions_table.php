<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->unsignedBigInteger('sessions_id');
            $table->string('slug', 1000);
            $table->string('title');
            $table->string('full_name');
            $table->string('email');
            $table->text('description');
            $table->date('session_date')->default('2023-06-14');
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
        Schema::dropIfExists('child_sessions');
    }
}
