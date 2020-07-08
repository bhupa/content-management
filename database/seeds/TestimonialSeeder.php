<?php

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $testimonial = [

            ['name' => 'Amit Shrestha','description'=>' I just wanted to thank you for such a great day. It was such a treat for me to have a day with my mom treating ourselves with such great people and fabulous food. It was very informative and I gained a lot of knowledge.','is_active' => 1],
             ['name' => 'Aamir Shrestha','description'=>'  I would really just like to say thanks!!! This is exactly what I needed, we all needed.  I came away form the class recognizing that I really need to take time for myself more often. I actually like the foods that I’m eating now','is_active' => 1],
           
        ];
         DB::table('testimonials')->insert($testimonial);
    }
}
