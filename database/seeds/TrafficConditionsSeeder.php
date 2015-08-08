<?php

use Illuminate\Database\Seeder;

class TrafficConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create array of key/value pair traffic conditions
        $keys = [
            'H' => 'Heavy',
            'M' => 'Medium',
            'L' => 'Light'
        ];

        // Insert tasks into the DB
        foreach($keys as $key => $description) {
            DB::table('traffic_conditions')->insert([
                'key' => $key,
                'description' => $description
            ]);
        }
    }
}
