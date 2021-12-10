<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\itemgiohang;
use App\Models\miniGioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class GioHang extends Controller
{
    //

    public function getGioHang()
    {
        $gioHang = Auth::user()->gioHang[0];
        return view('pages.web.giohang', ['gioHang' => $gioHang]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $gioHang = $user->giohang[0];
        $idGiohang =  $gioHang->id;
        $idNongSan = $request->idNongSan;
        $soLuong = $request->soLuong;

        $result =  itemgiohang::select()->where('id_nongsan', $idNongSan)->where("id_giohang", $idGiohang)->get();

        if (count($result) == 0) {
            // trường hợp nông sản không có trong giỏ hàng
            $item = new itemgiohang();
            $item->id_nongsan = (int)$idNongSan;
            $item->id_giohang = $idGiohang;
            $item->soluong = (int)$soLuong;
            $item->save();

            $mini = new MiniGioHang();
            $mini->soLuongThayDoi = $soLuong;
            $mini->soLuong = $soLuong;
            $mini->tongTien = $gioHang->tongTienGioHang($idGiohang);


            return $mini->toJson();
        } else {
            echo $result[0]->id;
            $item =  $result[0];
            $soLuong += $item->soluong;
            $item->soluong = $soLuong;

            itemgiohang::where('id_nongsan', $idNongSan)
                ->where('id_giohang', $idGiohang)
                ->update(['soluong' => $soLuong]);

            $mini = new MiniGioHang();
            $mini->soLuongThayDoi = $request->soLuong;
            $mini->soLuong = $soLuong;
            $mini->tongTien = $gioHang->tongTienGioHang($idGiohang);


            return $mini->toJson();
            // return "Dã có " . $result[0]->soluong . " trong giỏ hàng";
        }
    }

    public function deleteGiohang(Request $request)
    {

        $gioHang  =  Auth::user()->giohang[0];
        $id_gioHang = $gioHang->id;
        $id_nongsan = $request->id_nongsan;
        try {

            DB::table('itemgiohang')->where('id_nongsan', $id_nongsan)->where('id_giohang', $id_gioHang)->delete();
            return $gioHang->tongTienGioHang($id_gioHang);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
