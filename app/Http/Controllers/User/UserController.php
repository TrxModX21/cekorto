<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $pageTitle = 'Profile';
        $user = auth()->user();
        $name = $user->firstname . ' ' . $user->lastname;
        return view('templates.basic.profile', compact('pageTitle', 'user', 'name'));
    }
    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'string', 'email', "unique:users,email,{$user->id}"],
            'image' => ['nullable', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);

        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('userProfile'), getFileSize('userProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        $notify[] = ['success', 'Profile updated successfully'];
        return back()->withNotify($notify);
    }
    public function password()
    {
        $pageTitle = 'Password Setting';
        $user = auth()->user();
        $name = $user->firstname . ' ' . $user->lastname;
        return view('templates.basic.password', compact('pageTitle', 'user', 'name'));
    }
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password changed successfully.'];
        return back()->withNotify($notify);
    }
}
