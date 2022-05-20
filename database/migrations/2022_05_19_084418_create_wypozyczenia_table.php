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
        Schema::create('wypozyczenia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klienta');
            $table->foreign('id_klienta')->references('id')->on('wypozyczenia');
            $table->unsignedBigInteger('id_pojazdu');
            $table->foreign('id_pojazdu')->references('id')->on('wypozyczenia');
            $table->string('kowta_wypozyczenia_dzien');
            $table->date('data_rozpoczecia');
            $table->date('data_zakonczenia');
            $table->boolean('dod_ubezpieczenie');
            $table->integer('skan_umowy');


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
        Schema::dropIfExists('wypozyczenia');
    }
};
