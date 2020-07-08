<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTypeTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
//        $this->call(CountriesTableSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(AdminAccessSeeder::class);
    }
}
