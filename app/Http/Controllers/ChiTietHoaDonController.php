<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\hoadon;
use Illuminate\Http\Request;

class ChiTietHoaDonController extends Controller
{
    function getChiTietHoaDon($idHoaDon, Request $request)
    {
        $hoaDon = hoadon::find($idHoaDon);
        return view("pages.web.user.chi-tiet-hoa-don", ['hoaDon' => $hoaDon]);
    }
}
