<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoadConditionsSeeder::class);
        $this->call(RoadTypesSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(TrafficConditionsSeeder::class);
        $this->call(VisibilitySeeder::class);

        Model::reguard();
    }
}
