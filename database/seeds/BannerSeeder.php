<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $banner = [
            ['caption' => 'Banner1','display_order'=>'1','is_active' => 1],
           
        ];
         DB::table('banners')->insert($banner);
    }
}
