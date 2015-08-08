<?php

use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driving_tasks = [
            'City Driving',
            'Driving in Heavy Traffic',
            'Open Roads/Highways',
            'Country Driving',
            'Unsealed Roads',
            'Dawn/Dusk Driving',
            'Night Driving',
            'Wet Weather'
        ];

        foreach($driving_tasks as $task) {
            DB::table('tasks')->insert([
                'description' => $task
            ]);
        }
    }
}
