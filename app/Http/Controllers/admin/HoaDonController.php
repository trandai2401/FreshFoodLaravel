<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\hoadon;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    //
    function getViewAdmin()
    {
        $danhSachHoaDon = hoadon::orderByDesc('created_at')->get();
        return  $danhSachHoaDon;
    }

    function putTrangThaiHoaDon(Request $request)
    {
        $idTrangThai = $request->idTrangThai;
    }
}
