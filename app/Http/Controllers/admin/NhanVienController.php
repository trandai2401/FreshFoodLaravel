<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    //

    public function getView()
    {
        $id_NhanVien = role::select("*")->where("code", "STAFF")->get()[0]->id;
        $nhanViens = USer::select("*")->where("id_role", $id_NhanVien)->get();
        return view('pages.admin.nhanvien.nhanvien', ['nhanViens' => $nhanViens]);
    }


    public function updateNhanVien(Request $request)
    {
        $nhanVien = User::find($request->idNhanVien);
        $nhanVien->id_role = $request->id_role;
        $nhanVien->save();
        return 1;;
    }
}
