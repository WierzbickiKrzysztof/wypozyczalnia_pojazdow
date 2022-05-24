<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TypPojazduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_typ_pojazdu')->insert([

            'name'=>'Jednośladowy',
            'typ_pojazdu' => 'Hulajnoga'
            ]);

        DB::table('s_typ_pojazdu')->insert([

            'name'=>'Samochód osobowy',
            'typ_pojazdu' => 'Hatchback'
        ]);

        DB::table('s_typ_pojazdu')->insert([

            'name'=>'Jednośladowy',
            'typ_pojazdu' => 'Skuter'
        ]);
    }
}
