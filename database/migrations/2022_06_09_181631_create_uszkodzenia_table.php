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
        Schema::create('uszkodzenia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_wypozyczenia');
            $table->foreign('id_wypozyczenia')->references('id')->on('wypozyczenia');
            $table->unsignedBigInteger('id_pojazdu');
            $table->foreign('id_pojazdu')->references('id')->on('pojazdy');
            $table->text('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uszkodzenia');
    }
};
