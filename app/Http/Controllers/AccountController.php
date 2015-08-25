<?php

namespace App\Http\Controllers;

use App\Learner;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getSettings()
    {
        $user = Auth::user();
        $learner = $user->learner;

        return view('account.settings', compact('user', 'learner'));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function updateUserInfo(Request $request)
    {
        // Write custom error messages
        $messages = [
            'name.require' => 'We require your name.',
            'name.max' => 'Your name cannot exceed 255 characters.',
            'license_no.required' => 'Please enter your license number.',
            'license_no.min' => 'License number must be at least 6 characters long',
            'license_no.max' => 'License number cannot exceed 7 characters',
            'license_no.alpha_num' => 'A license number can only contain letters and numbers',
            'license_level.required' => 'Your license level is required',
            'license_level.in' => 'Only L1 and L2 are valid license levels'
        ];

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'license_no' => 'required|min:6|max:7|alpha_num',
            'license_level' => 'required|in:L1,l1,L2,l2'
        ], $messages);

        if($validator->fails()) {
            return redirect('account/settings')
                    ->with('form_name', 'userinfo')
                    ->withErrors($validator)
                    ->withInput();

        }
        else {
            // Ensure license level is in the correct format (i.e upper case)
            $request->merge(['license_level' => strtoupper($request->input('license_level'))]);

            // Ensure license number is in the correct format (i.e upper case)
            $request->merge(['license_no' => strtoupper($request->input('license_no'))]);

            // Save changes
            Auth::user()->learner->fill($request->all())->save();

            flash()->success('Your changes have been saved!');
            return redirect('account/settings')->with('flash_message');
        }
    }

    /**
     * @param Request $request
     */
    public function updateEmailPass(Request $request)
    {
        $user = Auth::user();


        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'confirmed|min:6'
        ]);

        if($validator->fails()) {
            return redirect('account/settings')
                ->with('form_name', 'emailpass')
                ->withErrors($validator)
                ->withInput();

        }
        else {
            // Set new values
            $user->email = $request->input('email');

            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            // Save changes
            if($user->save())
            {
                flash()->success('Your changes have been saved!');
            }
            else {
                flash()->warning('An error occurred while attempted to save your changes. Please try again.');
            }

            return redirect('account/settings')->with('flash_message');
        }
    }
}
