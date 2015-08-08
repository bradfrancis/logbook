<?php

use Illuminate\Database\Seeder;

class RoadConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create array of key/value pair road conditions
        $keys = [
            'D' => 'Dry',
            'W' => 'Wet',
            'I' => 'Icy',
            'S' => 'Snow'
        ];

        // Insert tasks into the DB
        foreach($keys as $key => $description) {
            DB::table('road_conditions')->insert([
                'key' => $key,
                'description' => $description
            ]);
        }
    }
}
