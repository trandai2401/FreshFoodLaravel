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
use App\Models\trangthai;
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
Route::get('/thongke', function () {
    // $thongke = DB::select('SELECT ten, DATE_ADD(?, INTERVAL id DAY) AS ngay, (SELECT COUNT(id) FROM freshfood.hoadon WHERE created_at < DATE_ADD(?, INTERVAL (thu_table.id + 1) DAY) AND created_at >= DATE_ADD(?, INTERVAL thu_table.id DAY)) AS SOlUONG FROM thu_table;', ["'2022/1/9'", "'2022/1/9'", "'2022/1/9'"]);

    $thongke = DB::select("SELECT ten, DATE_ADD('2022/1/9', INTERVAL id DAY) AS ngay, (SELECT COUNT(id) FROM freshfood.hoadon WHERE created_at < DATE_ADD('2022/1/9', INTERVAL (thu_table.id + 1) DAY) AND created_at >= DATE_ADD('2022/1/9', INTERVAL thu_table.id DAY)) AS SOlUONG FROM thu_table;");
    return $thongke;
    // DB::select('select * from users where active = ?', [1]);
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

    Route::get("dshoadon", function () {
        $hoaDons = hoadon::orderByDesc('created_at')->get();

        return
            view('pages.admin.ds-hoa-don', ["hoaDons" => $hoaDons]);
    })->name("DSHoaDon");




    Route::get("ds-hd-daduyet", function () {
        $hoaDons = hoadon::where('id_trangthai', 5)->orderByDesc('created_at')->get();
        return
            view('pages.admin.ds-hoa-don-daduyet', ["hoaDons" => $hoaDons]);
    })->name('dsHoaDonDaNhanHang');

    Route::get("chitiet-hd-kh/{idHoaDon}", function ($idHoaDon) {
        $hoaDon = hoaDon::find($idHoaDon);
        $trangThai = trangthai::get();
        return
            view('pages.admin.chitiet_hd_khachhang', ['hoaDon' => $hoaDon, 'trangThai' => $trangThai]);
    })->name('chiTietHoaDon');


    Route::post("chitiet-hd-kh/{idHoaDon}", function ($idHoaDon, Request $request) {
        $hoaDon = hoaDon::find($idHoaDon);
        $hoaDon->id_trangthai = $request->idTrangthai;
        $hoaDon->save();
        return $hoaDon;
    });


    Route::get("thongke", function () {
        return
            view('pages.admin.thongke');
    });
});

// HOME
Route::prefix('/')->group(function () {
    Route::get('home', [home::class, 'getHome'])->name('home');
    Route::get('danhmuc/{idNongSan}/{index}', [home::class, 'getPagebyIndex']);
    Route::get('danhmuc/{idDanhMuc}', [home::class, 'getSanPhamByDanhMuc'])->name('danhmuc');

    Route::get('nongsan/{idNongSan}', [home::class, 'getNongSanByID'])->name('nongsan');
    Route::get('phantrangcomment/{idNongSan}', [home::class, 'getCommentByNongSanByID']);
    Route::get('CmtTheoSao/{idNongSan}', [home::class, 'getCommentByNongSanByIDTheoSao']);
});
Route::post('/1234', function (Request $request) {

    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh  where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM  nongsan  where freshfood.bodau(tenNongSan) like freshfood.bodau('%" . $request->keyword . "%') or freshfood.bodau(noidung) like freshfood.bodau('%" . $request->keyword .  "%') and id_danhmuc = " . $request->idDanhMuc);
    $res2 = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh  where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM  nongsan  where freshfood.bodau(tenNongSan) like freshfood.bodau('%" . $request->keyword . "%') or freshfood.bodau(noidung) like freshfood.bodau('%" . $request->keyword .  "%') and id_danhmuc = " . $request->idDanhMuc);


    return view('pages.web.ketquatimkiem.ketquatimkiem', ['nongsans' => $res, 'solUongNongSanLocDuoc' => count($res2), 'idDanhMuc' => $request->idDanhMuc, 'trangDuocChon' => 1]);
});

Route::post('/123', function (Request $request) {

    // return $request->arrSoSao;
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
        $queryByAddress .= " false )  ";
    }

    $queryBySoSao = " ";
    if (isset($request->arrSoSao)) {

        $queryBySoSao = " and (";
        foreach ($request->arrSoSao as $soSao) {
            $queryBySoSao .= " ( sosao >= " . $soSao . " and sosao < " . ((int)($soSao + 1)) . " )  or";
        }
        $queryBySoSao .= " false )  ";
    }
    // return $queryBySoSao;

    $res = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan  where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . $queryBySoSao . " order by " . $sortBy . " LIMIT " . (($request->trangDuocChon - 1) * 6) . ",6");
    $res2 = DB::select("SELECT nongsan.id,tenNongSan,gia,(select src from hinhanh where nongsan.id = hinhanh.id_nongsan limit 1) as sr FROM nongsan  where gia >=  " . (int)$request->giaTribatDau .  $temp . "  and id_danhmuc = " . $request->idDanhMuc . $queryByAddress . $queryBySoSao . " order by " . $sortBy);
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

        $hoaDons = hoadon::where('id_user', $user->id)->offset(($trangDuocChon - 1) * 6)->limit(6)->orderByDesc('created_at')->get();
        // return  $hoaDons;
        return view("pages.web.user.danh-sach-hoa-don", ['hoaDons' => $hoaDons]);
    })->name('danhsachHoadon');



    Route::get('chiTietHD/{idHoaDon}', [ChiTietHoaDonController::class, 'getChiTietHoaDon'])->name('chiTietHD');

    Route::post('thanhtoan', [ThanhToan::class, 'postThanhToan']);

    Route::post('danhgia', [DanhGiaController::class, "postDanhGia"]);
});
