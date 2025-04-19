<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function all()
    {
        $pageTitle = 'All Symptom List';
        $symptoms = Symptom::searchable(['name', 'code'])->orderBy('created_at')->paginate(getPaginate());
        return view('admin.symptom.index', compact('pageTitle', 'symptoms'));
    }

    public function create()
    {
        $pageTitle = "Add Symptom Data";
        return view('admin.symptom.create', compact('pageTitle'));
    }

    public function edit($id)
    {
        $symptom = Symptom::findOrFail($id);
        $pageTitle = "Edit Symptom Data";
        return view('admin.symptom.edit', compact('symptom', 'pageTitle'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if (!$id) {
            $notification = 'Symptom added successfully';
            $symptom = new Symptom();
        } else {
            $notification = 'Symptom updated successfully';
            $symptom = Symptom::findOrFail($id);
        }

        $symptom->name = $request->name;
        $symptom->slug = $request->slug;
        $symptom->description = $request->description;
        $symptom->details = $request->details;
        $symptom->code = $request->code;
        if ($id) {
            $symptom->status = $request->status ? Status::ENABLE : Status::DISABLE;
        }
        $symptom->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Symptom::changeStatus($id);
    }

    public function destroy($id)
    {
        $destroyed = Symptom::findOrFail($id);
        $destroyed->delete();

        $notification = 'Symptom removed successfully';

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    private function validation($request, $id)
    {
        $request->validate([
            'name' => 'required|unique:symptoms,name,' . $id,
            'slug' => 'required|string|unique:symptoms,slug,' . $id,
            'description' => 'nullable|string|max:200',
            'details' => 'nullable',
        ]);
    }
}
