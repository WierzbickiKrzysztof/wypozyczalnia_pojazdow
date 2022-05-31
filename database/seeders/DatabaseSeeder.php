<?php

namespace Database\Seeders;

use App\Models\Pojazd;
use App\Models\S_marka;
use App\Models\S_model;
use App\Models\S_typ_pojazdu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Tester',
             'email' => 't@t'
             // hasło: password
         ]);
        $this->call([
            ZwrotySeeder::class
        ]);


        DB::table('S_typ_pojazdu')->insert([
            'name'=>'Samochód osobowy',
            'typ_pojazdu' => 'Klasa A',
            'cena' => '513.73'
        ]);

        DB::table('S_typ_pojazdu')->insert([
            'name'=>'Samochód osobowy',
            'typ_pojazdu' => 'Klasa B',
            'cena' => '367.73'
        ]);

        DB::table('S_typ_pojazdu')->insert([
            'name'=>'Samochód osobowy',
            'typ_pojazdu' => 'Klasa C',
            'cena' => '127.73'
        ]);

        DB::table('S_typ_pojazdu')->insert([

            'name'=>'Jednośladowy',
            'typ_pojazdu' => 'Hulajnoga',
            'cena' => '12'
        ]);

        DB::table('S_typ_pojazdu')->insert([

            'name'=>'Jednośladowy',
            'typ_pojazdu' => 'Skuter',
            'cena' => '30'
        ]);

        // Marki
        // ID 1 - Klasa A - Audi
        DB::table('S_marka')->insert([
            'name'=>'Audi',
            'id_typ_pojazdu' => 1
        ]);

        // ID 2 - Klasa B - Audi
        DB::table('S_marka')->insert([
            'name'=>'Audi',
            'id_typ_pojazdu' => 2
        ]);
        // ID 3 - Klasa C - Audi
        DB::table('S_marka')->insert([
            'name'=>'Audi',
            'id_typ_pojazdu' => 3
        ]);

        // ID 4 Opel
        DB::table('S_marka')->insert([
            'name'=>'Opel',
            'id_typ_pojazdu' => 1
        ]);

        // ID 5 Opel
        DB::table('S_marka')->insert([
            'name'=>'Opel',
            'id_typ_pojazdu' => 2
        ]);
        // ID 6 Opel
        DB::table('S_marka')->insert([
            'name'=>'Opel',
            'id_typ_pojazdu' => 3
        ]);


        // ID 7 Toyota
        DB::table('S_marka')->insert([
            'name'=>'Toyota',
            'id_typ_pojazdu' => 1
        ]);

        // ID 8 Toyota
        DB::table('S_marka')->insert([
            'name'=>'Toyota',
            'id_typ_pojazdu' => 2
        ]);
        // ID 9 Toyota
        DB::table('S_marka')->insert([
            'name'=>'Toyota',
            'id_typ_pojazdu' => 3
        ]);


        // Modele
        // Audi klasa A
        DB::table('S_model')->insert([
            'name'=>'A8',
            'id_marka' => 1
        ]);

        DB::table('S_model')->insert([
            'name'=>'Q7',
            'id_marka' => 1
        ]);

        // Audi klasa B
        DB::table('S_model')->insert([
            'name'=>'A3',
            'id_marka' => 2
        ]);

        DB::table('S_model')->insert([
            'name'=>'A4',
            'id_marka' => 2
        ]);

        // Audi klasa C
        DB::table('S_model')->insert([
            'name'=>'A5',
            'id_marka' => 3
        ]);

        DB::table('S_model')->insert([
            'name'=>'A6',
            'id_marka' => 3
        ]);


        // Opel klasa A
        DB::table('S_model')->insert([
            'name'=>'Astra',
            'id_marka' => 4
        ]);

        DB::table('S_model')->insert([
            'name'=>'Combo',
            'id_marka' => 4
        ]);

        // Opel klasa B
        DB::table('S_model')->insert([
            'name'=>'Corsa',
            'id_marka' => 5
        ]);

        DB::table('S_model')->insert([
            'name'=>'Insignia',
            'id_marka' => 5
        ]);

        // Opel klasa C
        DB::table('S_model')->insert([
            'name'=>'Mokka',
            'id_marka' => 6
        ]);

        DB::table('S_model')->insert([
            'name'=>'Grandland',
            'id_marka' => 6
        ]);


        // Toyota klasa A
        DB::table('S_model')->insert([
            'name'=>'Yaris',
            'id_marka' => 7
        ]);

        DB::table('S_model')->insert([
            'name'=>'Corolla',
            'id_marka' => 7
        ]);

        // Toyota klasa B
        DB::table('S_model')->insert([
            'name'=>'C-HR',
            'id_marka' => 8
        ]);

        DB::table('S_model')->insert([
            'name'=>'Supra',
            'id_marka' => 8
        ]);

        // Toyota klasa C
        DB::table('S_model')->insert([
            'name'=>'Aygo',
            'id_marka' => 9
        ]);

        DB::table('S_model')->insert([
            'name'=>'Auris',
            'id_marka' => 9
        ]);

    }
}
