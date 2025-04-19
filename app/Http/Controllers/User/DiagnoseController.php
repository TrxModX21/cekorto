<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Diagnose;
use App\Models\Disease;
use App\Models\Recommendation;
use App\Models\Symptom;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    public function index()
    {
        $pageTitle = 'Disease Diagnosis';
        $symptoms = Symptom::where('status', Status::ENABLE)->get();

        $results = session()->has('results') ? session('results') : [];
        $diagnose = session()->has('diagnose') ? session('diagnose') : null;
        $user = auth()->user();

        if (count($results) > 0 || $diagnose) {
            $diagnose = Diagnose::with('user', 'symptoms')->findOrFail($diagnose);
            $user = $diagnose->user;
        }

        return view('templates.basic.diagnose.index', compact('pageTitle', 'symptoms', 'results', 'diagnose', 'user'));
    }

    public function diagnose(Request $request)
    {
        $request->validate(
            [
                'selectedSymptoms' => ['required', 'array', 'min:1']
            ]
        );

        $selectedSymptoms = $request->selectedSymptoms;
        $diseases = Disease::with('symptoms', 'recommendations')->get();
        $results = [];

        foreach ($diseases as $disease) {
            $matchCount = 0;
            $totalWeight = 0;
            $diseaseSymptoms = $disease->symptoms->pluck('id')->toArray();

            foreach ($selectedSymptoms as $symptom) {
                if (in_array($symptom, $diseaseSymptoms)) {
                    $matchCount++;
                    $weight = $disease->symptoms->where('id', $symptom)->first()->pivot->weight;
                    $totalWeight += $weight;
                }
            }

            if ($matchCount > 0) {
                $similarity = ($totalWeight / count($disease->symptoms)) * 100;

                // TODO:: CHANGE RESULT STRUCTURE
                if ($similarity >= 0) {
                    $results[] = [
                        'disease' => $disease,
                        'percentage' => round($similarity, 2),
                        'recommendations' => $disease->recommendations,
                        'symptoms' => $request->selectedSymptoms
                    ];
                }
            }
        }

        usort($results, function ($a, $b) {
            return $b['percentage'] <=> $a['percentage'];
        });

        $diagnose = new Diagnose();
        $diagnose->user_id = auth()->user()->id;
        $diagnose->d_id = 'D-' . uniqid();
        $diagnose->results = $results;
        $diagnose->save();
        $diagnose->symptoms()->attach($request->selectedSymptoms);

        $notify[] = ['success', 'Diagnose process completed'];
        // session()->flash('results', $results);
        // session()->flash('diagnose', $diagnose->id);

        // return to_route('diagnose.index')->withNotify($notify);
        return to_route('diagnose.history.detail', $diagnose->id)->withNotify($notify);
    }

    public function history()
    {
        $pageTitle = 'Diagnosis History';
        $diagnoses = Diagnose::with('user')->where('user_id', auth()->user()->id)->latest('created_at')->paginate(getPaginate(10));

        return view('templates.basic.diagnose.history', compact('pageTitle', 'diagnoses'));
    }

    public function historyDetail($id)
    {
        $diagnose = Diagnose::with('symptoms', 'user')->findOrFail($id);
        $diseaseResult = [];
        foreach ($diagnose->results as $key => $disease) {
            $diseaseResult[] = [
                'disease' => Disease::with('recommendations')->find($disease['disease']['id']),
                'percentage' => $disease['percentage'],
            ];
        }

        // dd($diseaseResult);

        $user = $diagnose->user;
        $fullname = $user->firstname . ' ' . $user->lastname;

        $pageTitle = 'Diagnose ' . strtoupper($diagnose->d_id);

        return view('templates.basic.diagnose.history_detail', compact('pageTitle', 'user', 'fullname', 'diseaseResult', 'diagnose'));
    }
}
