<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptonController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Sympton Information';
        $symptoms = Symptom::where('status', Status::ENABLE)->get();

        return view('templates.basic.sympton', compact('pageTitle', 'symptoms'));
    }
}
