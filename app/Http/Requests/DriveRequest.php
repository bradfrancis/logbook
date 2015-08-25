<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class DriveRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formatted_start_date' => 'required|date_format:d/m/Y',
            'start_time' => 'required|date_format:g:i a',
            'formatted_end_date' => 'required|date_format:d/m/Y',
            'end_time' => 'required|date_format:g:i a',
            'distance_km' => 'numeric',
            'vehicle' => 'integer',
            'tasks' => 'array',
            'road_types' => 'array',
            'road_conditions' => 'array',
            'traffic_conditions' => 'array',
            'visibilities' => 'array'
        ];
    }
}
