<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Vehicle;

class VehiclesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicles = Auth::user()->learner->vehicles;

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(VehicleRequest $request)
    {
        if ($request->ajax()) {
            $vehicle = Auth::user()->learner->vehicles()->create($request->all());

            if ($vehicle) {
                return response()->json(['id' => $vehicle->id, 'value' => $vehicle->human_friendly]);
            }
            else {
                return Response::HTTP_BAD_REQUEST;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->fill($request->all());
        $success = $vehicle->save();

        if ($request->ajax()) {
            return ($success) ? Response::HTTP_OK : Response::HTTP_UNPROCESSABLE_ENTITY;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $success = Vehicle::find($id)->delete();

        if ($success) {
            return redirect('/vehicles');
        }
        else {
            return redirect('/vehicles', 422);
        }
    }
}
