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
        Schema::create('rezerwacje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klienta');
            $table->foreign('id_klienta')->references('id')->on('users');
            $table->unsignedBigInteger('id_pojazdu');
            $table->foreign('id_pojazdu')->references('id')->on('pojazdy');
            $table->string('kwota_wypozyczenia_dzien');
            $table->date('data_rozpoczecia');
            $table->date('data_zakonczenia');
            $table->string('calkowita_kwota');
            $table->integer('status_rezerwacji');
            //$table->integer('id_ubezpieczenia');
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
        Schema::dropIfExists('rezerwacje');
    }
};
