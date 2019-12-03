<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert(array(
            [
                'country_name' => 'Colombia'
            ],
            [
                'country_name' => 'Chile'
            ]
    ));
    }
}
