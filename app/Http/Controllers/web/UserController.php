<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function getProfile()
    {
        return view('pages.web.user.user-profile');
    }
}
