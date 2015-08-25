<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Drive;
use App\Task;
use App\RoadType;
use App\RoadCondition;
use App\TrafficCondition;
use App\Visibility;
use App\Http\Requests\DriveRequest;

class DrivesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owns_drive', ['except' => ['index', 'create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Get a listing of all the currently
        // logged in user's drives
        $drives = Auth::user()->learner->drives;

        return view('drives.index')->with(['drives' => $drives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $form_data = $this->generateFormData();

        return view('drives.create', compact('form_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DriveRequest|Request $request
     * @return Response
     */
    public function store(DriveRequest $request)
    {
        // Concatenate and format date + times
        $start = join(' ', [$request->input('formatted_start_date'), $request->input('start_time')]);
        $start = str_replace('/', '-', $start);
        $end = join(' ', [$request->input('formatted_end_date'), $request->input('end_time')]);
        $end = str_replace('/', '-', $end);

        // Parse newly created date/time strings into Carbon objects
        // and merge them into the form request
        $request->merge(['start_date' => Carbon::parse($start), 'end_date' => Carbon::parse($end)]);

        // Create new Drive
        $drive = Auth::user()->learner->drives()->create($request->all());

        // Sync road types, tasks, conditions, etc.
        $this->syncDriveRelations($drive, $request);

        // Create a success flash message
        flash()->success('Drive logged successfully!');
        return redirect('drives')->with('flash_message');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Drive $drive)
    {
        $drive = $drive->load('traffic_conditions', 'road_types',
            'visibilities', 'supervisor', 'vehicle');

        return view('drives.view', compact('drive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Drive $drive)
    {
        // Get required form data lists (e.g. road types, traffic conditions, etc.)
        $form_data = $this->generateFormData();

        return view('drives.edit', compact('drive', 'form_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DriveRequest $request, Drive $drive)
    {
        // Concatenate and format date + times
        $start = join(' ', [$request->input('formatted_start_date'), $request->input('start_time')]);
        $start = str_replace('/', '-', $start);
        $end = join(' ', [$request->input('formatted_end_date'), $request->input('end_time')]);
        $end = str_replace('/', '-', $end);

        // Parse newly created date/time strings into Carbon objects
        // and merge them into the form request
        $request->merge(['start_date' => Carbon::parse($start), 'end_date' => Carbon::parse($end)]);

        // Update Drive with new values
        $drive->fill($request->all())->save();

        // Sync road types, tasks, conditions, etc.
        $this->syncDriveRelations($drive, $request);

        // Create a success flash message
        flash()->success('Drive updated successfully!');
        return redirect('drives')->with('flash_message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Drive $drive)
    {
        ($drive->delete())
            ? flash()->info('Drive deleted!')
            : flash()->error('An error occurred. Please try again.');

        return redirect('dashboard')->with('flash_message');
    }

    /**
     * Collate and return all data needed to create/edit a logged drive
     *
     * @return array
     */
    private function generateFormData()
    {
        return [
            'vehicles' => Auth::user()->learner->vehicles->lists('human_friendly', 'id')->all(),
            'tasks' => Task::lists('description', 'id')->all(),
            'road_types' => RoadType::lists('description', 'id')->all(),
            'road_conditions' => RoadCondition::lists('description', 'id')->all(),
            'traffic_conditions' => TrafficCondition::lists('description', 'id')->all(),
            'visibilities' => Visibility::lists('description', 'id')->all(),
            'supervisors' => Auth::user()->learner->supervisors->lists('human_friendly', 'id')->all()
        ];

    }

    /**
     * Sync the relations of a given drive
     * (e.g. road types, traffic conditions, etc.)
     *
     * @param Drive $d
     * @param DriveRequest $request
     */
    private function syncDriveRelations(Drive $d, DriveRequest $request)
    {
        if ($request->has('tasks_list')) {
            $d->tasks()->sync($request->input('tasks_list'));
        }

        if ($request->has('road_types_list')) {
            $d->road_types()->sync($request->input('road_types_list'));
        }

        if ($request->has('road_conditions_list')) {
            $d->road_conditions()->sync($request->input('road_conditions_list'));
        }

        if ($request->has('traffic_conditions_list')) {
            $d->traffic_conditions()->sync($request->input('traffic_conditions_list'));
        }

        if ($request->has('visibilities_list')) {
            $d->visibilities()->sync($request->input('visibilities_list'));
        }
        
    }
}
