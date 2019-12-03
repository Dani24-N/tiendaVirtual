<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert(array(
            [
                'type_state_id' => 1,
                'state_name' => 'Activo',
                'description' => 'El usuario puede acceder a los servicios de la tienda virtual'
            ],
            [
                'type_state_id' => 1,
                'state_name' => 'Inactivo',
                'description' => 'El usuario no puede utilizar los servicios que ofrece la tienda virtual'
            ],
            [
                'type_state_id' => 1,
                'state_name' => 'Bloqueado',
                'description' => 'El usuario quebrantado las reglas de la tienda virtual'
            ]
        ));
    }
}
