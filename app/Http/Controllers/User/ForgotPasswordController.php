<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        $pageTitle = "Account Recovery";
        return view('templates.basic.user.auth.passwords.email', compact('pageTitle'));
    }

    public function sendResetCodeEmail(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $fieldType = $this->findFieldType();
        $user = User::where($fieldType, $request->value)->first();
        if (!$user) {
            $notify[] = ['error', 'The account could not be found'];
            return back()->withNotify($notify);
        }

        PasswordReset::where('email', $user->email)->delete();
        $code = verificationCode(6);
        $password = new PasswordReset();
        $password->email = $user->email;
        $password->token = $code;
        $password->created_at = Carbon::now();
        $password->save();

        $userIpInfo = getIpInfo();
        $userBrowserInfo = osBrowser();
        notify($user, 'PASS_RESET_CODE', [
            'code' => $code,
            'operating_system' => @$userBrowserInfo['os_platform'],
            'browser' => @$userBrowserInfo['browser'],
            'ip' => @$userIpInfo['ip'],
            'time' => @$userIpInfo['time']
        ], ['email']);

        $email = $user->email;
        session()->put('pass_res_mail', $email);
        session()->put('expired_at', Carbon::now()->addMinutes(5));

        $notify[] = ['success', 'Password reset email sent successfully'];
        return to_route('user.auth.password.code.verify')->withNotify($notify);
    }

    public function codeVerify(Request $request)
    {
        $pageTitle = 'Verify Email';

        $email = $request->session()->get('pass_res_mail');
        if (!$email || session('expired_at') <= Carbon::now()) {
            $notify[] = ['error', 'Oops! code or session expired'];
            return to_route('user.password.request')->withNotify($notify);
        }

        return view('templates.basic.user.auth.passwords.code_verify', compact('pageTitle', 'email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'email' => 'required'
        ]);
        $code = str_replace(' ', '', $request->code);

        if (PasswordReset::where('token', $code)->where('email', $request->email)->count() != 1) {
            $notify[] = ['error', 'Verification code doesn\'t match'];
            return to_route('user.auth.password.request')->withNotify($notify);
        }

        $notify[] = ['success', 'You can change your password'];
        session()->flash('fpass_email', $request->email);
        session()->put('token', $code);

        return to_route('user.auth.password.reset', $code)->withNotify($notify);
    }

    protected function findFieldType()
    {
        $input = request()->input('value');

        $fieldType = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $input]);
        return $fieldType;
    }
}
