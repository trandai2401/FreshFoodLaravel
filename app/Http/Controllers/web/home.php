<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\admin\nongsan;
use App\Http\Controllers\Controller;
use App\Models\binhluan;
use App\Models\danhmuc;
use App\Models\itemhoadon;
use App\Models\nongsan as ModelsNongsan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    //
    public function getHome()
    {
        $res = DB::select('SELECT id_nongsan,(SELECT count(ithd.id) FROM freshfood.itemhoadon as ithd where ithd.id_nongsan =freshfood.itemhoadon.id_nongsan ) as soluong FROM freshfood.itemhoadon group by id_nongsan order by soluong desc limit 4;');
        $nongSanNoiBat =  array();
        foreach ($res as $item) {
            $nongSan = ModelsNongsan::find($item->id_nongsan);
            $nongSanNoiBat[] = $nongSan;
        }

        // return $nongSanNoiBat;
        return view('pages.web.home', ['nongSanNoiBat' => $nongSanNoiBat]);
    }

    public function  getSanPhamByDanhMuc($idDanhMuc)
    {
        $arrayNongSAn =  ModelsNongsan::select()->where('id_danhmuc', $idDanhMuc)->offset(0)->limit(6)->get();
        $tenDanhMuc = danhmuc::select('*')->where('id', $idDanhMuc)->get();
        return view('pages.web.san-pham-danh-muc', ['nongsans' => $arrayNongSAn, 'tenDanhMuc' => $tenDanhMuc, "trangDuocChon" => 1]);
    }

    public function getNongSanByID($idNongSan, Request $request)
    {
        $idItemHoaDon = 0;
        if (isset($request->idItemHoaDon)) {
            $idItemHoaDon = $request->idItemHoaDon;
            $itemHoaDon = itemhoadon::find($request->idItemHoaDon);

            if ($itemHoaDon->duocdanhgia == 1) {
                $idItemHoaDon = 0;
            }
        }


        $trangDuocChon = 1;
        if (isset($request->trangDuocChon)) {
            $trangDuocChon = $request->trangDuocChon;
        }

        $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();


        $nongsan = ModelsNongsan::select()->where('id', $idNongSan)->get();
        return view('pages.web.san-pham', ['nongsan' => $nongsan[0], "idItemHoaDon" => $idItemHoaDon, 'binhLuans' => $binhLuan]);
    }


    public function  getPagebyIndex($idDanhMuc, $index)
    {
        $arrayNongSAn =  ModelsNongsan::select()->where('id_danhmuc', $idDanhMuc)->offset(($index - 1) * 6)->limit(6)->get();

        return view('pages.web.ketquatimkiem.ketqua-timkiem-phantrang', ['nongsans' => $arrayNongSAn]);
    }

    public function getCommentByNongSanByID($idNongSan, Request $request)
    {



        $trangDuocChon = 1;
        if (isset($request->trangDuocChon)) {
            $trangDuocChon = $request->trangDuocChon;
        }

        if ($request->locVoiSoSao == '0') {
            $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();
            $soBinhLuan = binhluan::where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();
        } else {
            $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->where('sosao', $request->locVoiSoSao)->orderByDesc('created_at')->get();
            $soBinhLuan = binhluan::where('id_nongsan', $idNongSan)->where('sosao', $request->locVoiSoSao)->orderByDesc('created_at')->get();
        }



        // $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();

        return view('pages.web.ketquatimkiem.PhanTrangCommentNongSan', ['binhLuans' => $binhLuan]);
    }

    public function getCommentByNongSanByIDTheoSao($idNongSan, Request $request)
    {
        $trangDuocChon = 1;
        if (isset($request->trangDuocChon)) {
            $trangDuocChon = $request->trangDuocChon;
        }
        if ($request->locVoiSoSao == '0') {
            $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();
            $soBinhLuan = binhluan::where('id_nongsan', $idNongSan)->orderByDesc('created_at')->get();
        } else {
            $binhLuan = binhluan::offset(($trangDuocChon - 1) * 3)->limit(3)->where('id_nongsan', $idNongSan)->where('sosao', $request->locVoiSoSao)->orderByDesc('created_at')->get();
            $soBinhLuan = binhluan::where('id_nongsan', $idNongSan)->where('sosao', $request->locVoiSoSao)->orderByDesc('created_at')->get();
        }


        return view('pages.web.ketquatimkiem.LocDanhGiaTheoSao', ['binhLuans' => $binhLuan, 'idNongSan' => $idNongSan, 'soBinhLuan' => $soBinhLuan]);
    }
}
