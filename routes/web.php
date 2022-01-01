<?php

use App\Http\Controllers\admin\add;
use App\Http\Controllers\admin\KhachHangController;
use App\Http\Controllers\admin\NhanVienController;
use App\Http\Controllers\admin\nongsan as AdminNongsan;
use App\Http\Controllers\login;
use App\Http\Controllers\web\GioHang;
use App\Http\Controllers\web\home;
use App\Http\Controllers\web\UserController;
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
Route::middleware('AuthAdmin', 'CheckLogin')->prefix('/admin')->group(function () {
    Route::get('nhanvien', [NhanVienController::class, 'getView'])->name('AdminNhanVien');
    Route::put('nhanvien', [NhanVienController::class, 'updateNhanVien']);

    Route::get('khachhang', [KhachHangController::class, 'getView'])->name('AdminKhachHang');
    Route::put('khachhang', [KhachHangController::class, 'updateNhanVien']);

    Route::get('nongsan', [AdminNongsan::class, 'getView'])->name("AdminNongSan");
    Route::get('add-nong-san', [AdminNongsan::class, 'get'])->name('AdminAddNongSan');
    Route::post('add-nong-san', [AdminNongsan::class, 'addNongSan']);
    Route::get('add', [add::class, 'hello']);
});

// HOME
Route::prefix('/')->group(function () {
    Route::get('home', [home::class, 'getHome'])->name('home');
    Route::get('danhmuc/{idDanhMuc}', [home::class, 'getSanPhamByDanhMuc'])->name('danhmuc');
    Route::get('nongsan/{idNongSan}', [home::class, 'getNongSanByID'])->name('nongsan');
});
Route::post('/1234', function (Request $request) {



    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where freshfood.bodau(tenNongSan) like freshfood.bodau('%" . $request->keyword . "%') or freshfood.bodau(noidung) like freshfood.bodau('%" . $request->keyword .  "%') and id_danhmuc = " . $request->idDanhMuc);


    return view('pages.web.ketquatimkiem.ketquatimkiem', ['nongsans' => $res]);
});

Route::post('/123', function (Request $request) {

    // echo $request->giaTribatDau;
    // if ($request->giaTriKetThuc == '') {
    //     echo "thèn cuối rỗng ruột";
    // } else {
    //     echo $request->giaTriKetThuc;
    // }
    $sortBy = $request->sortBy;
    $temp  = "";
    if ($request->giaTriKetThuc != '') {
        $temp = " and gia <= " . $request->giaTriKetThuc;
    }
    $queryByAddress = " ";
    if (isset($request->arrDiaDiem)) {

        $queryByAddress = " and (";
        foreach ($request->arrDiaDiem as $diaDiem) {
            $queryByAddress .= " freshfood.bodau(noisanxuat) like '%" . $diaDiem .  "%'  or";
        }
        $queryByAddress .= " false )";
    }


    // return $queryByAddress;
    // return "SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . " order by " . $sortBy;
    // return  "SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where gia >=  " . (int)$request->giaTribatDau . $temp . "  and id_danhmuc = " . $request->idDanhMuc;
    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . " order by " . $sortBy);

    return view('pages.web.ketquatimkiem.ketquatimkiem', ['nongsans' => $res]);
});



//USERS
Route::middleware('CheckLogin')->prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'getProfile'])->name('userProfile');

    Route::get('cart', [GioHang::class, 'getGioHang'])->name('cart');
    Route::delete('cart1', [GioHang::class, 'deleteGioHang'])->name('cart1');
    Route::post('cart', [GioHang::class, 'update']);

    Route::get('editProfile', function(){
        return view("pages.web.user.edit-profile");
    } );
});
