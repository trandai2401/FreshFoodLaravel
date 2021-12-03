<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    //
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $user = Auth::attempt(['tendangnhap' => $username, 'password' => $password]);
        if ($user) {
            echo "Đăng nhập thành công";
            // return redirect('home');
        } else {
            echo "Đăng nhập thất bại";
        }
    }
}
