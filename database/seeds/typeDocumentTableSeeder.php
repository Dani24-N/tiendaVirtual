<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeDocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_document')->insert(array(
            [
                'document_name' => 'Cedula de ciudadania',
                'description' => 'Mayores de 18 años'
            ],
            [
                'document_name' => 'Tarjeta de identidad',
                'description' => 'Menores de 18 años'
            ]
    ));
    }
}
