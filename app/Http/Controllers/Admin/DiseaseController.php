<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function all()
    {
        $pageTitle = 'All Disease List';
        $diseases = Disease::searchable(['name', 'code'])->orderBy('created_at')->paginate(getPaginate());
        return view('admin.disease.index', compact('pageTitle', 'diseases'));
    }

    public function create()
    {
        $pageTitle = "Add Disease Data";
        return view('admin.disease.create', compact('pageTitle'));
    }

    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        $pageTitle = "Edit Disease Data";
        return view('admin.disease.edit', compact('disease', 'pageTitle'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if (!$id) {
            $notification = 'Disease added successfully';
            $disease = new Disease();
        } else {
            $notification = 'Disease updated successfully';
            $disease = Disease::findOrFail($id);
        }

        $disease->name = $request->name;
        $disease->slug = $request->slug;
        $disease->description = $request->description;
        $disease->details = $request->details;
        $disease->code = $request->code;
        if ($id) {
            $disease->status = $request->status ? Status::ENABLE : Status::DISABLE;
        }
        $disease->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Disease::changeStatus($id);
    }

    public function destroy($id)
    {
        $destroyed = Disease::findOrFail($id);
        $destroyed->delete();

        $notification = 'Disease removed successfully';

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    private function validation($request, $id)
    {
        $request->validate([
            'name' => 'required|unique:diseases,name,' . $id,
            'slug' => 'required|string|unique:diseases,slug,' . $id,
            'description' => 'nullable|string|max:200',
            'details' => 'nullable',
        ]);
    }
}
