<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_state')->insert(
            [
                'type_state_name' => 'Usuario',
                'description' => 'Define en que posibles estados puede estar el usuario en la tienda virtual'
            ]
        );
    }
}
