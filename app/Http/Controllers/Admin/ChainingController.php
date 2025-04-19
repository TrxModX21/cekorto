<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DiseaseRecommendation;
use App\Models\DiseaseSymptom;
use App\Models\Recommendation;
use App\Models\Symptom;
use Illuminate\Http\Request;

class ChainingController extends Controller
{
    public function all()
    {
        $pageTitle = 'All Disease - Symptom Rules';

        $symptoms = Symptom::where('status', Status::ENABLE)->get();
        $diseases = Disease::where('status', Status::ENABLE)->get();
        $datas = DiseaseSymptom::with(['disease', 'symptom'])->paginate(getPaginate());

        return view('admin.chaining.index', compact('pageTitle', 'symptoms', 'diseases', 'datas'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if (!$id) {
            $notification = 'Data added successfully';
            $datas = new DiseaseSymptom();
        } else {
            $notification = 'Data updated successfully';
            $datas = DiseaseSymptom::findOrFail($id);
        }

        $datas->disease_id = $request->disease;
        $datas->symptom_id = $request->symptom;
        $datas->weight = $request->weight;
        $datas->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $data = DiseaseSymptom::findOrFail($id);
        $data->delete();
        $notify[] = ['success', 'Symptom disease pair deleted successfully'];
        return back()->withNotify($notify);
    }


    public function recommendationAll()
    {
        $pageTitle = 'All Disease - Reommendation Rules';

        $recommendations = Recommendation::get();
        $diseases = Disease::where('status', Status::ENABLE)->get();
        $datas = DiseaseRecommendation::with(['disease', 'recommendation'])->paginate(getPaginate());

        return view('admin.chaining.recommendation', compact('pageTitle', 'recommendations', 'diseases', 'datas'));
    }

    public function storeRecommendation(Request $request, $id = 0)
    {
        $this->recommendationValidation($request, $id);

        if (!$id) {
            $notification = 'Data added successfully';
            $datas = new DiseaseRecommendation();
        } else {
            $notification = 'Data updated successfully';
            $datas = DiseaseRecommendation::findOrFail($id);
        }

        $datas->disease_id = $request->disease;
        $datas->recommendation_id = $request->recommendation;
        $datas->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function destroyRecommendation($id)
    {
        $data = DiseaseRecommendation::findOrFail($id);
        $data->delete();
        $notify[] = ['success', 'Recommendation disease pair deleted successfully'];
        return back()->withNotify($notify);
    }

    protected function validation($request, $id)
    {
        $symptomValidation = $id ? 'nullable' : 'required';
        $diseaseValidation = $id ? 'nullable' : 'required';

        $request->validate([
            'symptom' => $symptomValidation,
            'disease' => $diseaseValidation,
            'weight' => 'required|decimal:0,1'
        ]);
    }

    protected function recommendationValidation($request, $id)
    {
        $recommendationValidation = $id ? 'nullable' : 'required';
        $diseaseValidation = $id ? 'nullable' : 'required';

        $request->validate([
            'recommendation' => $recommendationValidation,
            'disease' => $diseaseValidation
        ]);
    }
}
