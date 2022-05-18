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
            $table->string('unikatowy_id_pojazdu');
            $table->string('marka');
            $table->string('model');
            $table->string('wersja');
            $table->string('przebieg');
            $table->string('stan');
            $table->string('paliwo');
            $table->integer('id_wyp');
            $table->date('data_wypozyczenia');
            $table->date('data_zwrotu');

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
