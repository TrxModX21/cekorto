<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\NotificationLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    public function allUsers()
    {
        $pageTitle = 'All Users';
        $users = $this->userData();
        return view('admin.users.list', compact('pageTitle', 'users'));
    }

    public function activeUsers()
    {
        $pageTitle = 'Active Users';
        $users = $this->userData('active');
        return view('admin.users.list', compact('pageTitle', 'users'));
    }

    public function bannedUsers()
    {
        $pageTitle = 'Banned Users';
        $users = $this->userData('banned');
        return view('admin.users.list', compact('pageTitle', 'users'));
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = 'User Detail - ' . $user->username;
        return view('admin.users.detail', compact('pageTitle', 'user'));
    }

    public function login($id)
    {
        Auth::loginUsingId($id);
        return to_route('user.profile');
    }

    public function notificationLog($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = 'Notifications Sent to ' . $user->username;
        $logs = NotificationLog::where('user_id', $id)->with('user')->orderBy('id', 'desc')->paginate(getPaginate());

        return view('admin.reports.notification_history', compact('pageTitle', 'logs', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'gender' => 'required',
            'age' => 'nullable',
            'email' => 'required|email|string|max:40|unique:users,email,' . $user->id,
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'User details updated successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status == Status::USER_ACTIVE) {
            $request->validate([
                'reason' => 'required|string|max:255'
            ]);
            $user->status = Status::USER_BAN;
            $user->ban_reason = $request->reason;
            $notify[] = ['success', 'User banned successfully'];
        } else {
            $user->status = Status::USER_ACTIVE;
            $user->ban_reason = null;
            $notify[] = ['success', 'User unbanned successfully'];
        }
        $user->save();
        return back()->withNotify($notify);
    }

    protected function userData($scope = null)
    {
        if ($scope) {
            $users = User::$scope();
        } else {
            $users = User::query();
        }
        return $users->searchable(['username', 'email'])->orderBy('id', 'desc')->paginate(getPaginate());
    }
}
