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
        Schema::create('pojazdy', function (Blueprint $table) {
            $table->id();

            //np. numer rejestracyjny
            $table->string('nr_pojazdu');

            //Int - id odwołanie do tabeli słownikowej
            $table->unsignedBigInteger('typ_pojazdu');
            $table->foreign('typ_pojazdu')->references('id')->on('S_typ_pojazdu');

            //int - id odwołanie do tabeli słownikowej
            $table->unsignedBigInteger('marka');
            $table->foreign('marka')->references('id')->on('S_marka');

            //int - id odwołanie do tabeli słownikowej
            $table->unsignedBigInteger('model');
            $table->foreign('model')->references('id')->on('S_model');

            //
            $table->string('wersja');

            //
            $table->string('stan');

            //przebieg
            $table->integer('przebieg');

            //
            $table->integer('pojemnosc_baku');


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
        Schema::dropIfExists('pojazdy');
    }
};
