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
        $arrayNongSAn =  ModelsNongsan::select()->where('id_danhmuc', $idDanhMuc)->get();
        $tenDanhMuc = danhmuc::select('*')->where('id', $idDanhMuc)->get();
        return view('pages.web.san-pham-danh-muc', ['nongsans' => $arrayNongSAn, 'tenDanhMuc' => $tenDanhMuc]);
    }

    public function getNongSanByID($idNongSan)
    {
        $nongsan = ModelsNongsan::select()->where('id', $idNongSan)->get();
        return view('pages.web.san-pham', ['nongsan' => $nongsan[0]]);
    }
}
