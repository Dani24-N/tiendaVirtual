<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert(
            [
                'department_id' => 6,
                'city_name' => 'Guateque'
            ]
        );
    }
}
