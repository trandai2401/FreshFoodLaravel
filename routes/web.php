<?php

use App\Http\Controllers\admin\add;
use App\Http\Controllers\admin\HoaDonController;
use App\Http\Controllers\admin\KhachHangController;
use App\Http\Controllers\admin\NhanVienController;
use App\Http\Controllers\admin\nongsan as AdminNongsan;
use App\Http\Controllers\ChiTietHoaDonController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\login;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ThanhToan;
use App\Http\Controllers\web\GioHang;
use App\Http\Controllers\web\home;
use App\Http\Controllers\web\UserController;
use App\Models\danhmuc;
use App\Models\giohang as ModelsGiohang;
use App\Models\hoadon;
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
Route::get('redirect', [SocialController::class, 'redirect'])->name('loginRedirect');
Route::get('callback', [SocialController::class, 'callback']);



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

    Route::get("hoadon", [HoaDonController::class, 'getViewAdmin']);

    Route::get("dshoadon", function(){
        return
        view('pages.admin.ds-hoa-don');
    });
});

// HOME
Route::prefix('/')->group(function () {
    Route::get('home', [home::class, 'getHome'])->name('home');
    Route::get('danhmuc/{idNongSan}/{index}', [home::class, 'getPagebyIndex']);
    Route::get('danhmuc/{idDanhMuc}', [home::class, 'getSanPhamByDanhMuc'])->name('danhmuc');

    Route::get('nongsan/{idNongSan}', [home::class, 'getNongSanByID'])->name('nongsan');
});
Route::post('/1234', function (Request $request) {

    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh  where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM  nongsan  where freshfood.bodau(tenNongSan) like freshfood.bodau('%" . $request->keyword . "%') or freshfood.bodau(noidung) like freshfood.bodau('%" . $request->keyword .  "%') and id_danhmuc = " . $request->idDanhMuc);
    $res2 = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh  where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM  nongsan  where freshfood.bodau(tenNongSan) like freshfood.bodau('%" . $request->keyword . "%') or freshfood.bodau(noidung) like freshfood.bodau('%" . $request->keyword .  "%') and id_danhmuc = " . $request->idDanhMuc);


    return view('pages.web.ketquatimkiem.ketquatimkiem', ['nongsans' => $res, 'solUongNongSanLocDuoc' => count($res2), 'idDanhMuc' => $request->idDanhMuc, 'trangDuocChon' => 1]);
});

Route::post('/123', function (Request $request) {
    $sortBy = $request->sortBy;
    $temp  = "";
    if ($request->giaTriKetThuc != '') {
        $temp = " and gia <= " . $request->giaTriKetThuc;
    }
    $queryByAddress = " ";
    if (isset($request->arrDiaDiem)) {

        $queryByAddress = " and (";
        foreach ($request->arrDiaDiem as $diaDiem) {
            $queryByAddress .= " freshfood.bodau(noisanxuat) like  freshfood.bodau('%" . $diaDiem .  "%')   or";
        }
        $queryByAddress .= " false )";
    }


    // return $queryByAddress;
    // return "SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . " order by " . $sortBy;
    // return  "SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan where gia >=  " . (int)$request->giaTribatDau . $temp . "  and id_danhmuc = " . $request->idDanhMuc;
    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan  where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . " order by " . $sortBy . " LIMIT " . (($request->trangDuocChon - 1) * 6) . ",6");
    $res2 = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan  where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . " order by " . $sortBy);
    $idDanhMuc = $request->idDanhMuc;
    return view('pages.web.ketquatimkiem.ketquatimkiem', [
        'nongsans' => $res,
        'trangDuocChon' => ($request->trangDuocChon),
        'idDanhMuc' => intval($idDanhMuc), 'solUongNongSanLocDuoc' => count($res2)
    ]);
});



//USERS
Route::middleware('CheckLogin')->prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'getProfile'])->name('userProfile');

    Route::get('cart', [GioHang::class, 'getGioHang'])->name('cart');
    Route::delete('cart1', [GioHang::class, 'deleteGioHang'])->name('cart1');
    Route::post('cart', [GioHang::class, 'update']);
    Route::post('thanhtoan', [ThanhToanController::class,]);
    Route::get('editProfile', function () {
        return view("pages.web.user.edit-profile");
    })->name('editProfile');


    Route::get('danhsachHoadon', function (Request $request) {
        $user = Auth::user();
        $trangDuocChon = 1;
        if (isset($request->trangDuocChon)) {
            $trangDuocChon = $request->trangDuocChon;
        }

        $hoaDons = hoadon::offset(($trangDuocChon - 1) * 6)->limit(6)->get();
        // return  $hoaDons;
        return view("pages.web.user.danh-sach-hoa-don", ['hoaDons' => $hoaDons]);
    })->name('danhsachHoadon');

    Route::get('chiTietHD/{idHoaDon}', [ChiTietHoaDonController::class, 'getChiTietHoaDon'])->name('chiTietHD');

    Route::post('thanhtoan', [ThanhToan::class, 'postThanhToan']);

    Route::post('danhgia', [DanhGiaController::class, "postDanhGia"]);
});
