<?php

namespace Database\Seeders;

use App\Models\Pojazd;
use App\Models\S_marka;
use App\Models\S_model;
use App\Models\S_typ_pojazdu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        //Pojazd::factory(6)->create();

        S_typ_pojazdu::factory(1)->create();
        S_marka::factory(1)->create();
        S_model::factory(1)->create();

    }
}
