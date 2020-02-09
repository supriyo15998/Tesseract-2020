<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Category::insert([
        	['name' => 'Model Display', 'slug' => 'model-display'],
        	['name' => 'Robotics', 'slug' => 'robotics'],
        	['name' => 'Coding', 'slug' => 'coding'],
        	['name' => 'Gaming', 'slug' => 'gaming'],
        	['name' => 'Miscellaneous', 'slug' => 'miscellaneous']
        ]);
    }
}
