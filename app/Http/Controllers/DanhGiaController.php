<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\nongsan;
use App\Http\Controllers\Controller;
use App\Models\binhluan;
use App\Models\itemhoadon;
use App\Models\nongsan as ModelsNongsan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    //
    function postDanhGia(Request $request)
    {
        $idItemHoaDon = $request->idItemHoaDon;
        $itemHoaDon = itemhoadon::find($idItemHoaDon);
        // return $itemHoaDon;
        $soSao = $request->soSao;
        $noiDung = $request->noiDung;
        $id_NongSan = $itemHoaDon->id_nongsan;


        $user = Auth::user();
        $danhGia = new binhluan();
        $danhGia->id_user = $user->id;
        $danhGia->id_nongsan = $id_NongSan;
        $danhGia->noidung = $noiDung;
        $danhGia->sosao = $soSao;


        $itemHoaDon->duocdanhgia = 1;
        $itemHoaDon->save();
        $danhGia->save();


        $nongSan = ModelsNongsan::find($itemHoaDon->id_nongsan);
        $nongSan->soluongdanhgia++;
        $nongSan->sosao = ($nongSan->sosao * ($nongSan->soluongdanhgia - 1) + $danhGia->sosao) / ($nongSan->soluongdanhgia);

        $nongSan->save();
        $result  = ["danhGia" => $danhGia, "nongSan" => $nongSan];
        return $result;
    }
}
