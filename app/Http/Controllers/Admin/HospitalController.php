<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $pageTitle = 'Hospital Management';
        $hospitals = Hospital::searchable(['name'])->orderBy('name')->paginate(getPaginate());

        return view('admin.hospital.index', compact('pageTitle', 'hospitals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);
        $slug = slug($request->name);

        $hospital = new Hospital();

        if ($request->hasFile('image')) {
            try {
                $hospital->images = fileUploader($request->image, getFilePath('hospitals'), getFileSize('hospitals'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload hospital image'];
                return back()->withNotify($notify);
            }
        }

        $hospital->name = $request->name;
        $hospital->slug = $slug;
        $hospital->latitude = $request->latitude;
        $hospital->longitude = $request->longitude;
        $hospital->save();

        $notify[] = ['success', 'Hospitals added successfully'];
        return back()->withNotify($notify);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);

        $hospital = Hospital::findOrFail($id);

        if ($request->hasFile('image')) {
            try {
                $old = $hospital->images;
                
                $hospital->images = fileUploader($request->image, getFilePath('hospitals'), getFileSize('hospitals'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload hospital image'];
                return back()->withNotify($notify);
            }
        }

        $hospital->name = $request->name;
        $hospital->slug = slug($request->name);
        $hospital->latitude = $request->latitude;
        $hospital->longitude = $request->longitude;
        $hospital->save();

        $notify[] = ['success', 'Language updated successfully'];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);

        fileManager()->removeFile(getFilePath('hospitals') . '/' . $hospital->images);
        $hospital->delete();

        $notify[] = ['success', 'Hospital deleted successfully'];
        return back()->withNotify($notify);
    }
}
