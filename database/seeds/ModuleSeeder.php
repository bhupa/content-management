<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['name' => 'Configuration', 'alias'=>'configuration', 'display_order' => '1'],
            ['name' => 'Admin Type', 'alias'=>'admin-type', 'display_order' => '2'],
            ['name' => 'Admin', 'alias'=>'admin', 'display_order' => '3'],
            ['name' => 'Event', 'alias'=>'event', 'display_order' => '5'],
            ['name' => 'Blog Categories', 'alias'=>'blog_categories', 'display_order' => '5'],
            ['name' => 'Blog', 'alias'=>'blog', 'display_order' => '6'],
            ['name' => 'Member', 'alias'=>'member', 'display_order' => '8'],
            ['name' => 'Member Type', 'alias'=>'member_type', 'display_order' => '9'],
            ['name' => 'Content', 'alias'=>'content','display_order' => '7'],
            ['name' => 'Gallery', 'alias'=>'gallery', 'display_order' => '11'],
            ['name' => 'Site Setting',  'alias'=>'site-setting','display_order' => '14'],
            ['name' => 'Testimonial', 'alias'=>'testimonial', 'display_order' => '15'],
            ['name' => 'User',  'alias'=>'user','display_order' => '16'],
            ['name' => 'Destination',  'alias'=>'destination','display_order' => '17'],
            ['name' => 'Setting',  'alias'=>'setting','display_order' => '22'],
            ['name' => 'Modules',  'alias'=>'modules','display_order' => '23'],

        ];
        \DB::table('modules')->insert($modules);
    }
}
