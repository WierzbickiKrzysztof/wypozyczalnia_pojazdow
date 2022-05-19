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
            $table->integer('id_klienta');
            $table->integer('id_pojazdu');
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
