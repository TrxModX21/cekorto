<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function socialLogin()
    {
        dd('socialLogin');
    }

    public function callback()
    {
        dd('callback');
    }
}
