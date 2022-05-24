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
        Schema::create('S_typ_pojazdu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('typ_pojazdu');          //suv, coupe itd
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
        Schema::dropIfExists('S_typ_pojazdu');
    }
};
