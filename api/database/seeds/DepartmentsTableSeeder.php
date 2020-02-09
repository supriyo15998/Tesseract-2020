<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Department::insert([[
            'name' => 'Computer Science and Engineering',
            'slug' => 'computer-science-and-engineering'
        ],[
            'name' => 'Information Technology',
            'slug' => 'information-technology'
        ],[
            'name' => 'Electrical Engineering',
            'slug' => 'electrical-engineering'
        ],[
            'name' => 'Electronics and Communication Engineering',
            'slug' => 'electronics-and-communication-enginnering'
        ],[
            'name' => 'Applied Electronics and Engineering',
            'slug' => 'applied-electronics-and-instrumental-engineering'
        ],[
            'name' => 'Food Tehchnology',
            'slug' => 'food-technology'
        ],[
            'name' => 'Hospitality Management',
            'slug' => 'hospitality-management'
        ],[
            'name' => 'Bachelor of Computer Application',
            'slug' => 'bachelor-of-computer-application'
        ],[
            'name' => 'Diploma in Electronics and Telecommunication',
            'slug' => 'diploma-in-electronics-and-telecommunication'
        ],[
            'name' => 'Diploma in Electrical',
            'slug' => 'diploma-in-electrical'
        ],[
            'name' => 'Masters in Computer Application',
            'slug' => 'masters-in-computer-application'
        ],[
            'name' => 'M.Tech in ECE',
            'slug' => 'mtech-in-ece'
        ],[
            'name' => 'M.Tech in CSE',
            'slug' => 'mtech-in-cse'
        ],[
            'name' => 'M.Tech in FT',
            'slug' => 'mtech-in-ft'
        ],[
            'name' => 'M.Tech in EE',
            'slug' => 'mtech-in-ee'
        ],[
            'name' => 'MBA',
            'slug' => 'masters-in-business-administration'
        ]]);
    }
}
