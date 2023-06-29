<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
       for ($i=0; $i < 30; $i++) { 
           $user = new User;
           $user->name = fake()->name();
           $user->email = fake()->email();
           $user->password = bcrypt('secret');
           $user->save();
       }
    }
}