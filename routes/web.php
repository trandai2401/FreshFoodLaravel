<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Throw_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('pages.login');
})->name("login");

Route::post('/login', function (Request $request) {
    $username = $request['username'];
    $password = $request['password'];

    $user = Auth::attempt(['tendangnhap' => $username, 'password' => $password]);
    if ($user) {
        echo "Đăng nhập thành công";
        // return redirect('home');
    } else {
        echo "Đăng nhập thất bại";
    }
});




Route::get('/signup', function () {
    return view('pages.signup');
})->name("signup");

Route::post('/signup', function (Request $request) {
    $email = $request['email'];
    $name = $request['name'];
    $password = $request['password'];
    $address = $request['address'];
    $phone = $request['phone'];
    $DOB  = $request['DOB'];
    try {

        DB::table('users')->insert([
            'tendangnhap' => $name, 'email' => $email, 'password' => bcrypt($password), 'diachi' => $address, 'sodienthoai' => $phone
        ]);
        return redirect("login");
    } catch (Throw_ $e) {
        echo "Lỗi rồi đó thấy chưa";
    }
    echo $name;
});
