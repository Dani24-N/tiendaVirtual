<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'role_name' => 'Cliente',
                'description' => 'Usuario el cual puede realizar compras y tendra limitaciones en la tienda virtual'
            ]
        );
    }
}
