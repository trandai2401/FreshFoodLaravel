<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\admin\nongsan;
use App\Http\Controllers\Controller;
use App\Models\danhmuc;
use App\Models\nongsan as ModelsNongsan;
use Illuminate\Http\Request;

class home extends Controller
{
    //
    public function getHome()
    {
        return view('pages.web.home');
    }

    public function  getSanPhamByDanhMuc($idDanhMuc)
    {
        $arrayNongSAn =  ModelsNongsan::select()->where('id_danhmuc', $idDanhMuc)->offset(0)->limit(6)->get();
        $tenDanhMuc = danhmuc::select('*')->where('id', $idDanhMuc)->get();
        return view('pages.web.san-pham-danh-muc', ['nongsans' => $arrayNongSAn, 'tenDanhMuc' => $tenDanhMuc, "trangDuocChon" => 1]);
    }

    public function getNongSanByID($idNongSan)
    {
        $idItemHoaDon = 0;



        $nongsan = ModelsNongsan::select()->where('id', $idNongSan)->get();
        return view('pages.web.san-pham', ['nongsan' => $nongsan[0]]);
    }


    public function  getPagebyIndex($idDanhMuc, $index)
    {
        $arrayNongSAn =  ModelsNongsan::select()->where('id_danhmuc', $idDanhMuc)->offset(($index - 1) * 6)->limit(6)->get();

        return view('pages.web.ketquatimkiem.ketqua-timkiem-phantrang', ['nongsans' => $arrayNongSAn]);
    }
}
