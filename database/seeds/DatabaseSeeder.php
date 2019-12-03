<?php

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
        $this->call(roleTableSeeder::class);
        $this->call(typeDocumentTableSeeder::class);
        $this->call(countryTableSeeder::class);
        $this->call(departmentTableSeeder::class);
        $this->call(cityTableSeeder::class);
        $this->call(typeStateTableSeeder::class);
        $this->call(stateTableSeeder::class);
    }
}
