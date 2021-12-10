<?php

use App\Http\Controllers\admin\add;
use App\Http\Controllers\admin\nongsan as AdminNongsan;
use App\Http\Controllers\login;
use App\Http\Controllers\web\GioHang;
use App\Http\Controllers\web\home;
use App\Models\danhmuc;
use App\Models\itemgiohang;
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


Route::get('/', function () {
    echo csrf_token();
    // return view('welcome');
});


//LOGIN SIGNUP LOGOUT
Route::get('/login', [login::class, 'getLogin'])->name("login");
Route::post('/login', [login::class, 'login']);

Route::get('/signup', [login::class, 'getSignup'])->name("signup");
Route::post('/signup', [login::class, 'postSignup']);
Route::get('/logout', [login::class, 'getLogout'])->name('logout');

//ADMIN
Route::middleware('CheckLogin')->middleware('AuthAdmin')->prefix('/admin')->group(function () {
    Route::get('add-nong-san', [AdminNongsan::class, 'get']);
    Route::post('add-nong-san', [AdminNongsan::class, 'addNongSan']);
    Route::get('add', [add::class, 'hello']);
});

// HOME
Route::prefix('/')->group(function () {
    Route::get('home', [home::class, 'getHome'])->name('home');
    Route::get('danhmuc/{idDanhMuc}', [home::class, 'getSanPhamByDanhMuc'])->name('danhmuc');
    Route::get('nongsan/{idNongSan}', [home::class, 'getNongSanByID']);
});
Route::get('/1234/{id}', function ($id) {
    return view('pages.web.demo');
});


//USERS
Route::middleware('CheckLogin')->prefix('/user')->group(function () {
    Route::get('cart', [GioHang::class, 'getGioHang']);
    Route::delete('cart1', [GioHang::class, 'deleteGioHang'])->name('cart1');


    Route::post('cart', [GioHang::class, 'update']);
});
