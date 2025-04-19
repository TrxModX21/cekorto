<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageAdminController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Admins';
        $admins = $this->adminData();
        return view('admin.admins.list', compact('pageTitle', 'admins'));
    }

    public function save(Request $request, $id = 0)
    {
        $passwordValidation = 'required';

        if ($id) {
            $passwordValidation = 'nullable';
        }

        $request->validate([
            'name' => 'required|string|max:40',
            'username' => 'required|string|max:40|unique:admins,username,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => $passwordValidation
        ]);

        $admin = new Admin();
        $notification = 'Reviewer added successfully';

        if ($id) {
            $admin = Admin::findOrFail($id);
            $notification = 'Reviewer updated successfully';

            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
        } else {
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function updateStatus($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->status = $admin->status ? 0 : 1;
        $admin->save();

        $notification = 'Admin banned successfully';
        if ($admin->status) {
            $notification = 'Admin unbanned Successfully';
        }

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function login($id)
    {
        $admin = Admin::where('status', 1)->findOrFail($id);
        Auth::guard('admin')->loginUsingId($admin->id);
        return to_route('admin.dashboard');
    }

    protected function adminData($scope = null)
    {
        if ($scope) {
            $admins = Admin::$scope();
        } else {
            $admins = Admin::query();
        }
        return $admins->where('role', 'admin')->searchable(['username', 'email'])->orderBy('id', 'desc')->paginate(getPaginate());
    }
}
