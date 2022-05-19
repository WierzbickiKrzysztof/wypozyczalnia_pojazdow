<?php

namespace Database\Seeders;

use App\Models\Pojazd;
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
             'name' => 'Jan Kowalski',
             'email' => 'jankowalski@carrental.com',
             'password' => '123456'
         ]);

        //Pojazd::factory(6)->create();
    }
}
