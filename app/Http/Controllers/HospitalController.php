<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $pageTitle = 'Hospitals Location';
        return view('templates.basic.map', compact('pageTitle'));
    }

    public function getHospitals(Request $request)
    {
        $bounds = [
            'north' => $request->input('north'),
            'south' => $request->input('south'),
            'east' => $request->input('east'),
            'west' => $request->input('west'),
        ];

        $hospitals = Hospital::whereBetween('latitude', [$bounds['south'], $bounds['north']])
            ->whereBetween('longitude', [$bounds['west'], $bounds['east']])
            ->get(['id', 'name', 'latitude', 'longitude']);

        return response()->json($hospitals);
    }
}

