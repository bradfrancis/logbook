<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Drive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Drive::creating(function ($drive) {
           // Make sure the user is logged in
           if (! Auth::check()) { return false; }

           // Check that the vehicle belongs to the learner
           if ($drive->getAttribute('vehicle_id')) {
               return $this->ownsVehicle($drive);
           }

           return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function ownsVehicle(Drive $drive)
    {
        // Get the current Learner
        $learner = Auth::user()->learner;

        // Check if a record is present matching
        // the given learner id and vehicle id.
        // This tells us the vehicle "belongs to"
        // the learner.
        $result = DB::table('learner_vehicle')
            ->where('learner_id', '=', $learner->id)
            ->where('vehicle_id', '=', $drive->vehicle_id)
            ->get();

        return (! empty($result));
    }
}
