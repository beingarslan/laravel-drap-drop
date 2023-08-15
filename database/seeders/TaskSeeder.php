<?php

namespace Database\Seeders;

use App\Models\Task;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Factory::create();
         for ($i = 0; $i < 10; $i++) {
              Task::create([
                'task_name' => $faker->name,
                'priority' => $i+1,
              ]);
         }

    }
}
