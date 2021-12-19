<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    //

    public function getView()
    {
        $id_NhanVien = role::select("*")->where("code", "USER")->get()[0]->id;
        $nhanViens = User::select("*")->where("id_role", $id_NhanVien)->get();
        return view('pages.admin.khachhang.khachhang', ['nhanViens' => $nhanViens]);
    }
}
