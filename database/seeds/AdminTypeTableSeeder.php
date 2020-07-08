<?php

use Illuminate\Database\Seeder;

class AdminTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminTypes = [
            ['id' => 1, 'name' => 'Developer', 'is_active' => 1],
            ['id' => 2, 'name' => 'Site Admin', 'is_active' => 1],
        ];

        DB::table('admin_types')->insert($adminTypes);
    }
}