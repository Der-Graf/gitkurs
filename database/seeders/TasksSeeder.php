<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    //Kreiere für jeden User 3-10 Einträge in die Tabelle tasks
    foreach($user as $user)
        {
            Task::factory(rand(3,10))->for($user)->create();
        }

    /*
     * Run the database seeds.
     *
    public function run(): void
    {
        Task::factory()->count(10)->create();
    }
    */   
}
