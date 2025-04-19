<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{

    public function showResetForm(Request $request, $token)
    {
        $email = session('pass_res_mail');
        $token = session()->has('token') ? session('token') : null;

        if (PasswordReset::where('token', $token)->where('email', $email)->count() != 1 || session('expired_at') <= Carbon::now()) {
            session()->forget('pass_res_mail');
            session()->forget('token');
            session()->forget('expired_at');
            $notify[] = ['error', 'Invalid or expired verification code'];
            return to_route('user.auth.password.request')->withNotify($notify);
        }

        return view('templates.basic.user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email, 'pageTitle' => 'Reset Password']
        );
    }

    public function reset(Request $request, $token)
    {
        $request->validate($this->rules());
        $reset = PasswordReset::where('token', $token)->orderBy('created_at', 'desc')->first();

        if (!$reset) {
            $notify[] = ['error', 'Invalid or expired verification code'];
            return to_route('user.auth.login')->withNotify($notify);
        }

        $user = User::where('email', $reset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $userIpInfo = getIpInfo();
        $userBrowser = osBrowser();
        notify($user, 'PASS_RESET_DONE', [
            'operating_system' => @$userBrowser['os_platform'],
            'browser' => @$userBrowser['browser'],
            'ip' => @$userIpInfo['ip'],
            'time' => @$userIpInfo['time']
        ], ['email']);

        session()->forget('pass_res_mail');
        session()->forget('token');
        session()->forget('expired_at');

        $notify[] = ['success', 'Password changed successfully'];
        return to_route('user.auth.login')->withNotify($notify);
    }

    protected function rules()
    {
        $passwordValidation = Password::min(6);

        if (gs('secure_pass')) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', $passwordValidation],
        ];
    }
}
