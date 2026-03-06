<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
    $table->id('user_id');
    $table->unsignedBigInteger('level_id')->index(); // index untuk foreign key
    $table->string('username',50)->unique(); // username tidak boleh sama
    $table->string('nama',100);
    $table->string('password');
    $table->timestamps();

    // Mendefinisikan foreign key pada kolom level_id yang mereferensikan kolom level_id di tabel m_level
    $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_user');
    }
};
