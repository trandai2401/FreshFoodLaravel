<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Throw_;

class login extends Controller
{
    //
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $user = Auth::attempt(['tendangnhap' => $username, 'password' => $password]);
        if ($user) {
            return redirect()->route('home');
            // return redirect('home');
        } else {
            echo "Đăng nhập thất bại";
        }
    }






    public function getSignup()
    {
        return view('pages.web.signup');
    }

    public function  postSignup(Request $request)
    {
        $email = $request['email'];
        $username = $request['username'];
        $password = $request['password'];
        $address = $request['address'];
        $phone = $request['phone'];
        $DOB  = $request['DOB'];
        $name = $request['name'];
        try {

            $res =  DB::table('users')->insert([
                'name' => $name,  'tendangnhap' => $username, 'email' => $email, 'password' => bcrypt($password), 'diachi' => $address, 'sodienthoai' => $phone, 'id_role' => 2, 'ngaysinh' => $DOB
            ]);
        } catch (Throw_ $e) {
            echo "Lỗi rồi đó thấy chưa";
        }
        echo $name;
    }
}
