<?php

use Illuminate\Database\Seeder;

class VisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create array of key/value pair visibilities
        $keys = [
            'D' => 'Day',
            'N' => 'Night',
            'F' => 'Fog',
            'S' => 'Dawn/Dusk'
        ];

        // Insert tasks into the DB
        foreach($keys as $key => $description) {
            DB::table('visibility')->insert([
                'key' => $key,
                'description' => $description
            ]);
        }
    }
}
