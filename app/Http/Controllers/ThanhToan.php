<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\nongsan;
use App\Http\Controllers\Controller;
use App\Models\hoadon;
use App\Models\itemgiohang;
use App\Models\itemhoadon;
use App\Models\nongsan as ModelsNongsan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThanhToan extends Controller
{
    //
    function postThanhToan(Request $request)
    {
        $user  = Auth::user();
        $gioHang = $user->giohang[0];

        $diaChi = $request->diaChi;
        $tienShip = $request->tienShip;
        $soDienThoai = $user->soDienThoai;
        $nguoiNhan = $user->name;

        $hoaDon  = new hoadon();
        $hoaDon->tongtien = $gioHang->tongTienGioHang($gioHang->id);
        $hoaDon->diachi = $diaChi;
        $hoaDon->tienship =  $tienShip;
        $hoaDon->sodienthoai = $soDienThoai;
        $hoaDon->nguoinhan = $nguoiNhan;
        $hoaDon->id_user = $user->id;
        $hoaDon->id_trangthai = 1;

        $hoaDon->save();

        $chiTietGiohangs = itemgiohang::where('id_giohang', $user->giohang[0]->id)->get();
        foreach ($chiTietGiohangs as $item) {

            $itemHoaDon = new itemhoadon();
            $itemHoaDon->id_hoadon =  $hoaDon->id;

            $itemHoaDon->soluong = $item->soluong;

            $nongsan = ModelsNongsan::find($item->id_nongsan);
            $itemHoaDon->id_nongsan = $nongsan->id;
            $itemHoaDon->dongia = $nongsan->gia;
            $itemHoaDon->save();
        }


        itemgiohang::where('id_giohang', $user->giohang[0]->id)->delete();
        return  $hoaDon;
    }
}
