<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Disease Information';
        $diseases = Disease::with('symptoms', 'recommendations')->where('status', Status::ENABLE)->get();

        return view('templates.basic.disease', compact('pageTitle', 'diseases'));
    }
}
