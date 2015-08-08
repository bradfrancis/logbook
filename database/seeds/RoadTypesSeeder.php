<?php

use Illuminate\Database\Seeder;

class RoadTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create array of key/value pair road types
        $keys = [
            'S' => 'Residential Street',
            'M' => 'Main Road',
            'C' => 'Inner City',
            'H' => 'Highway',
            'R' => 'Rural Road'
        ];

        // Insert tasks into the DB
        foreach($keys as $key => $description) {
            DB::table('road_types')->insert([
                'key' => $key,
                'description' => $description
            ]);
        }


    }
}

//$task_keys = ['S', 'M', 'C', 'H', 'R', 'G'];