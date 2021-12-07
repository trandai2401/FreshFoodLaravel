<?php

use App\Http\Controllers\admin\add;
use App\Http\Controllers\admin\nongsan as AdminNongsan;
use App\Http\Controllers\login;
use App\Models\danhmuc;
use App\Models\nongsan;
use App\Models\role;
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


// Route::get('/', function () {
//     echo csrf_token();
//     // return view('welcome');
// });



Route::get('/login', function () {
    return view('pages.web.login');
})->name("login");
Route::post('/login', [login::class, 'login']);


Route::get('/signup', [login::class, 'getSignup'])->name("signup");
Route::post('/signup', [login::class, 'postSignup']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');



Route::prefix('/admin')->group(function () {
    Route::get('add-nong-san', [AdminNongsan::class, 'get']);
    Route::post('add-nong-san', [AdminNongsan::class, 'addNongSan']);
    Route::get('add', [add::class, 'hello']);
});



Route::prefix('/')->group(function () {
    Route::get('home', function () {
        return view('pages.web.home');
    })->name('home');

    Route::post('home', function () {
        $arrayNongSAn =  nongsan::select()->where('id_danhmuc', 3)->get();
        return view('pages.web.home', ['nongsans' => $arrayNongSAn]);
    })->name('home');

    Route::get('danhmuc/{idDanhMuc}', function ($id) {
        $arrayNongSAn =  nongsan::select()->where('id_danhmuc', $id)->get();
        $tenDanhMuc = danhmuc::select('*')->where('id', $id)->get();
        return view('pages.web.san-pham-danh-muc', ['nongsans' => $arrayNongSAn, 'tenDanhMuc' => $tenDanhMuc]);
    })->name('danhmuc');
});
Route::get('/1234', function () {
    echo 123;
});
