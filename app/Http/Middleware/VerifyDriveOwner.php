<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Learner;

class VerifyDriveOwner
{
    /**
     * Verify that a user has permission to view a drive
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if ($request->has('drives')) {
//            $learner_id = $request->input('drives')['learner_id'];
//        }
//
//        $learner = Learner::findOrFail($learner_id);
//
//        $owner_id = null;
//        if ($learner) { $owner_id = $learner->user->id; }
//
//        // If the two user id's don't match,
//        // permission is denied; throw an error.
//        if($owner$user_id != $owner_id) {
//            abort(403, "Access denied!");
//        }
//
        return $next($request);
    }
}
