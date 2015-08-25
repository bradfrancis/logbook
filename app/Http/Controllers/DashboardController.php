<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a user's dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $learner = Auth::user()->learner()->with('drives')->first();
        $drives = $learner->drives;
        $tasks = null;

        if ($drives->count())
        {
            $learner->drives->load('tasks');

            $tasks = [];

            for($i = 0; $i < $drives->count() && count($tasks) < 15; $i++) {
                $tasks = array_merge($tasks, $drives[$i]->getRelation('tasks')->toArray());
            }

            $tasks = array_slice($tasks, 0, 15);
        }

        return view('dashboard.index')->with(['learner' => $learner, 'tasks' => $tasks]);
    }
}
