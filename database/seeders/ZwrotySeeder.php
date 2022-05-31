<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ZwrotySeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zwroty')->insert([

            'name'=>'Nie zwrócony'
        ]);

        DB::table('zwroty')->insert([

            'name'=>'Zwrócony'
        ]);

    }
}
