<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class nongsan extends Controller
{
    //

    function get()
    {
        $arrayDanhMuc = danhmuc::select('*')->get();
        return view('pages.admin.add_nong_san', ['arrayDanhMuc' => $arrayDanhMuc]);
    }

    function addNongSan(Request $request)
    {

        if ($request->has('images')) {
            $ten = $request->ten;
            $idDanhMuc = $request->danhmuc;
            $soluong = $request->soluong;
            $noisanxuat  = $request->noisanxuat;
            $gia = $request->gia;
            $ngayThuHoach = $request->ngaythuhoach;
            $noidung = $request->noidung;
            echo "cCó images $ten $idDanhMuc $soluong $noisanxuat $gia $ngayThuHoach $noidung";

            $id = DB::table('nongsan')->insertGetId([
                'tennongsan' => $ten,
                'gia' => $gia,
                'soluong' => $soluong,
                'id_danhmuc' => $idDanhMuc,
                'noisanxuat' => $noisanxuat,
                'noidung' => $noidung


            ]);

            DB::table('hinhanh')->insert([
                'id_nongsan' => $id,
                'src' => "img/image" . $id . ".jpg"
            ]);

            $images = $request->images;
            $images->move("img", 'image' . $id . '.jpg');
        } else {
            echo "không";
        }
    }
}
