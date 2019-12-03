<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert(array(
            [
                'country_id' => 1,
                'department_name' => 'Amazonas'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Antioquia'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Arauca'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Atlántico'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Bolívar'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Boyacá'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Caldas'
            ],
            [
                'country_id' => 1,
                'department_name' => 'Caquetá'
            ],[
                'country_id' => 1,
                'department_name' => 'Casanare'
            ],[
                'country_id' => 1,
                'department_name' => 'Cauca'
            ],[
                'country_id' => 1,
                'department_name' => 'Cesar'
            ],[
                'country_id' => 1,
                'department_name' => 'Chocó'
            ],[
                'country_id' => 1,
                'department_name' => 'Cordoba'
            ],[
                'country_id' => 1,
                'department_name' => 'Cundinamarca'
            ],[
                'country_id' => 1,
                'department_name' => 'Guainía'
            ],[
                'country_id' => 1,
                'department_name' => 'Guaviare'
            ],[
                'country_id' => 1,
                'department_name' => 'Huila'
            ],
            [
                'country_id' => 1,
                'department_name' => 'La Guajira'
            ],[
                'country_id' => 1,
                'department_name' => 'Magdalena'
            ],[
                'country_id' => 1,
                'department_name' => 'Meta'
            ],[
                'country_id' => 1,
                'department_name' => 'Meta'
            ],[
                'country_id' => 1,
                'department_name' => 'Nariño'
            ],[
                'country_id' => 1,
                'department_name' => 'Norte de Santander'
            ],[
                'country_id' => 1,
                'department_name' => 'Putumayo'
            ],[
                'country_id' => 1,
                'department_name' => 'Quindio'
            ],[
                'country_id' => 1,
                'department_name' => 'Risaralda'
            ],[
                'country_id' => 1,
                'department_name' => 'San Andres Y Providencia'
            ],[
                'country_id' => 1,
                'department_name' => 'Santander'
            ],[
                'country_id' => 1,
                'department_name' => 'Sucre'
            ],[
                'country_id' => 1,
                'department_name' => 'Tolima'
            ],[
                'country_id' => 1,
                'department_name' => 'Valle del Cauca'
            ],[
                'country_id' => 1,
                'department_name' => 'Vaupés'
            ],[
                'country_id' => 1,
                'department_name' => 'Vichada'
            ]
        ));
    }
}
