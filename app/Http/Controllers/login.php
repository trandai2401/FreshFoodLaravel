<?php

namespace App\Http\Controllers;

use App\Models\giohang;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Throw_;

class login extends Controller
{
    //



    public function getLogin()
    {
        return view('pages.web.login');
    }
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $user = Auth::attempt(['tendangnhap' => $username, 'password' => $password]);
        if ($user) {
            return 1;
            // return redirect('home');
        } else {
            return "Đăng nhập thất bại ! Sai username hoặc password";
        }
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
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
            $res =  DB::table('users')->insertGetId([
                'name' => $name,  'tendangnhap' => $username, 'email' => $email, 'password' => bcrypt($password), 'diachi' => $address, 'sodienthoai' => $phone, 'id_role' => 2, 'ngaysinh' => $DOB
            ]);
            DB::table('giohang')->insert(['id_user' => $res]);
            return redirect("/login");
        } catch (Throw_ $e) {
            echo "Lỗi rồi đó thấy chưa";
        }
        
    }
}
