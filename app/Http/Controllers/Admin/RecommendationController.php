<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Recommendation;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function all()
    {
        $pageTitle = 'All Disease Recommendation List';
        $recommendations = Recommendation::searchable(['title', 'short_desc'])->orderBy('created_at')->paginate(getPaginate());
        return view('admin.recommendation.index', compact('pageTitle', 'recommendations'));
    }

    public function create()
    {
        $pageTitle = 'Add Recommendation Data';
        $diseases = Disease::where('status', Status::ENABLE)->get();

        return view('admin.recommendation.create', compact('pageTitle', 'diseases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);

        $recommendation = new Recommendation();

        if ($request->hasFile('image')) {
            try {
                $recommendation->image = fileUploader($request->image, getFilePath('recommendations'), getFileSize('recommendations'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload hospital image'];
                return back()->withNotify($notify);
            }
        }

        $recommendation->code = $request->code;
        $recommendation->title = $request->title;
        $recommendation->priority = $request->priority;
        $recommendation->long_desc = $request->description;
        $recommendation->save();

        $notify[] = ['success', 'Recommendation added successfully'];
        return back()->withNotify($notify);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);

        $recommendation = Recommendation::findOrFail($id);

        if ($request->hasFile('image')) {
            try {
                $old = $recommendation->image;
                $recommendation->image = fileUploader($request->image, getFilePath('recommendations'), getFileSize('recommendations'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload recommendation image'];
                return back()->withNotify($notify);
            }
        }

        $recommendation->code = $request->code;
        $recommendation->title = $request->title;
        $recommendation->priority = $request->priority;
        $recommendation->long_desc = $request->description;
        $recommendation->save();

        $notify[] = ['success', 'Recommendation updated successfully'];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        fileManager()->removeFile(getFilePath('recommendations') . '/' . $recommendation->image);
        $recommendation->delete();

        $notify[] = ['success', 'Recommendation deleted successfully'];
        return back()->withNotify($notify);
    }
}
