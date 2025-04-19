<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnose;
use App\Models\Disease;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function systemInfo()
    {
        $laravelVersion = app()->version();
        $timeZone = config('app.timezone');
        $pageTitle = 'Application Information';
        return view('admin.system.info', compact('pageTitle', 'laravelVersion', 'timeZone'));
    }
    public function systemServerInfo()
    {
        $currentPHP = phpversion();
        $pageTitle = 'Server Information';
        $serverDetails = $_SERVER;
        return view('admin.system.server', compact('pageTitle', 'currentPHP', 'serverDetails'));
    }
    public function optimize()
    {
        $pageTitle = 'Clear System Cache';
        return view('admin.system.optimize', compact('pageTitle'));
    }
    public function optimizeClear()
    {
        Artisan::call('optimize:clear');
        $notify[] = ['success', 'Cache cleared successfully'];
        return back()->withNotify($notify);
    }

    public function resetDiagnose()
    {
        $pageTitle = 'Reset User Diagnose Data';
        return view('admin.system.reset.diagnose', compact('pageTitle'));
    }

    public function resetDiagnoseProcess()
    {
        $datas = Diagnose::get();
        foreach ($datas as $data) {
            $data->delete();
        }

        $notify[] = ['success', 'Diagnose database reset successfully'];
        return back()->withNotify($notify);
    }

    public function resetUser()
    {
        $pageTitle = 'Reset User Database';
        return view('admin.system.reset.user', compact('pageTitle'));
    }

    public function resetUserProcess()
    {
        $datas = User::get();
        foreach ($datas as $data) {
            $data->delete();
        }

        $notify[] = ['success', 'User database reset successfully'];
        return back()->withNotify($notify);
    }

    public function resetDisease()
    {
        $pageTitle = 'Reset Disease Database';
        return view('admin.system.reset.disease', compact('pageTitle'));
    }

    public function resetDiseaseProcess()
    {
        $datas = Disease::get();
        foreach ($datas as $data) {
            $data->delete();
        }

        $notify[] = ['success', 'Disease database reset successfully'];
        return back()->withNotify($notify);
    }

    public function resetSymptom()
    {
        $pageTitle = 'Reset Symptom Database';
        return view('admin.system.reset.symptom', compact('pageTitle'));
    }

    public function resetSymptomProcess()
    {
        $datas = Symptom::get();
        foreach ($datas as $data) {
            $data->delete();
        }

        $notify[] = ['success', 'Symptom database reset successfully'];
        return back()->withNotify($notify);
    }
}
