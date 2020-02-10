<?php

use Illuminate\Database\Seeder;

class CreateSuperUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['name' => 'Tesseract Admin', 'email' => 'admin@tesseractgnit.com', 'password' => Hash::make('Admin@2020')]);
    }
}
