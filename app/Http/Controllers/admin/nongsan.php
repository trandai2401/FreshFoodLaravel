<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\danhmuc;
use App\Models\nongsan as ModelsNongsan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class nongsan extends Controller
{
    //

    public function getView()
    {
        $nongSans = ModelsNongsan::select()->get();
        return view('pages.admin.nongsan.nongsan', ['nongSans' => $nongSans]);
    }

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

            $noidung = $request->noidung;
            echo "cCó images $ten $idDanhMuc $soluong $noisanxuat $gia  $noidung";

            $id = DB::table('nongsan')->insertGetId([
                'tennongsan' => $ten,
                'gia' => $gia,
                'soluong' => $soluong,
                'id_danhmuc' => $idDanhMuc,
                'noisanxuat' => $noisanxuat,
                'noidung' => $noidung


            ]);
            for ($i = 0; $i < 10; $i++) {
                if ($request->has('images' . $i)) {
                    echo 'images' . $i;
                    DB::table('hinhanh')->insert([
                        'id_nongsan' => $id,
                        'src' => "img/image" . $id . "_" . $i . ".jpg"
                    ]);

                    $images = $request['images' . $i];
                    $images->move("img", 'image' . $id  . "_" . $i . '.jpg');
                } else {
                    break;
                }
            }
            // DB::table('hinhanh')->insert([
            //     'id_nongsan' => $id,
            //     'src' => "img/image" . $id . ".jpg"
            // ]);

            // $images = $request['images'];
            // $images->move("img", 'image' . $id . '.jpg');
        } else {
            echo "không";
        }
    }
}
