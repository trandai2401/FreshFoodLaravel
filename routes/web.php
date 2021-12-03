<?php

use App\Http\Controllers\admin\add;
use App\Http\Controllers\login;
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


    echo csrf_token();


    // return view('welcome');
});

Route::get('/login', function () {
    return view('pages.web.login');
})->name("login");

Route::post('/login', [login::class, 'login']);




Route::get('/signup', function () {
    return view('pages.web.signup');
})->name("signup");

Route::post('/signup', function (Request $request) {
    $email = $request['email'];
    $username = $request['username'];
    $password = $request['password'];
    $address = $request['address'];
    $phone = $request['phone'];
    $DOB  = $request['DOB'];
    $name = $request['name'];
    try {

        DB::table('users')->insert([
            'name' => $name,  'tendangnhap' => $username, 'email' => $email, 'password' => bcrypt($password), 'diachi' => $address, 'sodienthoai' => $phone, 'id_role' => 2
        ]);
        return redirect("login");
    } catch (Throw_ $e) {
        echo "Lỗi rồi đó thấy chưa";
    }
    echo $name;
});


Route::prefix('/admin')->group(function () {
    Route::get('add-nong-san', function () {
        return view('pages.admin.add_nong_san');
    });
    Route::get('add', [add::class, 'hello']);
});
