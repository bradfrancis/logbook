<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Supervisor;

class SupervisorsController extends Controller
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
        $supervisors = Auth::user()->learner->supervisors;

        return view('supervisors.index', compact('supervisors'));
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
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required',
            'license_no' => 'required|max:7'
        ];

        // Customise the error messages
        $messages = [
            'license_no.max' => 'License number can be no longer than 7 characters long',
            'license_no.required' => 'The license number field is required.'
        ];

        // Validate
        $v = Validator::make($request->all(), $rules, $messages);

        // Handle the results
        if ($v->fails())
        {
            if ($request->ajax())
            {
                return response($v->errors(), 422);
            }
        }
        else
        {
            $supervisor = Auth::user()->learner->supervisors()->create($request->all());

            if ($supervisor)
            {
                if ($request->ajax())
                {
                    return response()->json(['id' => $supervisor->id, 'value' => $supervisor->human_friendly]);
                }
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
    public function update(Request $request, $id)
    {
        // Get the supervisor model
        $supervisor = Supervisor::find($id);

        // Define validation rules
        $rules = [
            'name' => 'required',
            'license_no' => 'required|max:7'
        ];

        // Customise the error messages
        $messages = [
            'license_no.max' => 'License number can be no longer than 7 characters long',
            'license_no.required' => 'The license number field is required.'
        ];

        // Validate
        $v = Validator::make($request->all(), $rules, $messages);

        // Handle the results
        if ($v->fails())
        {
            if ($request->ajax())
            {
                return response($v->errors(), 422);
            }
        }
        else
        {
            // Update the model with values from the request
            $supervisor->fill($request->all());

            // Save the changes
            $success = $supervisor->save();

            // Return the results
            if ($success)
            {
                if ($request->ajax())
                {
                    return ($success) ? Response::HTTP_OK : Response::HTTP_UNPROCESSABLE_ENTITY;
                }
            }

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
        $success = Supervisor::find($id)->delete();

        if ($success) {
            return redirect('/supervisors');
        }
        else {
            return redirect('/supervisors', 422);
        }
    }
}
