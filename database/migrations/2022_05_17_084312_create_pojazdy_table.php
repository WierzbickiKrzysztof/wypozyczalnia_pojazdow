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
            $table->integer('typ_pojazdu');

            //int - id odwołanie do tabeli słownikowej
            $table->integer('marka');

            //int - id odwołanie do tabeli słownikowej
            $table->integer('model');

            //int - id odwołanie do tabeli słownikowej
            $table->integer('wersja');

            //int - id odwołanie do tabeli słownikowej
            $table->integer('stan');

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
