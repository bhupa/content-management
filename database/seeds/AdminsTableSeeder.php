<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['admin_type_id' => 1, 'first_name' => 'Developer', 'email' => 'developer@genstechnology.com', 'password' => bcrypt('password'), 'is_active' => 1],
            ['admin_type_id' => 2, 'first_name' => 'Site Admin', 'email' => 'admin@genstechnology.com', 'password' => bcrypt('password'), 'is_active' => 1],
        ];
        DB::table('admins')->insert($admins);
    }
}
