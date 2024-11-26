<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;



class TaskSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<50;$i++){
            Todo::create([
                'task' => "laravel api creation",
                'description' => "create a crud operations using php",
               'status' => $faker->randomElement(['Active', 'Inactive']),
            ]);
        }
    }
}
