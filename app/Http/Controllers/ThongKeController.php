<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    function getBieuDoCot()
    {
        // $thongke = DB::select('SELECT ten, DATE_ADD(?, INTERVAL id DAY) AS ngay, (SELECT COUNT(id) FROM freshfood.hoadon WHERE created_at < DATE_ADD(?, INTERVAL (thu_table.id + 1) DAY) AND created_at >= DATE_ADD(?, INTERVAL thu_table.id DAY)) AS SOlUONG FROM thu_table;', ["'2022/1/9'", "'2022/1/9'", "'2022/1/9'"]);
        $thongke = DB::select("SELECT ten, DATE_ADD('2022/1/9', INTERVAL id DAY) AS ngay, (SELECT COUNT(id) FROM hoadon WHERE created_at < DATE_ADD('2022/1/9', INTERVAL (thu_table.id + 1) DAY) AND created_at >= DATE_ADD('2022/1/9', INTERVAL thu_table.id DAY)) AS SOlUONG FROM thu_table;");
        return $thongke;
        // DB::select('select * from users where active = ?', [1]);
    }
    function getBieuDoTron()
    {
        // $thongke = DB::select('SELECT ten, DATE_ADD(?, INTERVAL id DAY) AS ngay, (SELECT COUNT(id) FROM freshfood.hoadon WHERE created_at < DATE_ADD(?, INTERVAL (thu_table.id + 1) DAY) AND created_at >= DATE_ADD(?, INTERVAL thu_table.id DAY)) AS SOlUONG FROM thu_table;', ["'2022/1/9'", "'2022/1/9'", "'2022/1/9'"]);
        $thongke = DB::select(" SELECT dm.id,dm.tenDanhMuc,(SELECT count(ithd.id ) FROM itemhoadon as ithd ,nongsan as nss where ithd.id_nongsan = nss.id and nss.id_danhmuc =dm.id) as soluong FROM danhmuc as dm  ;");
        return $thongke;
        // DB::select('select * from users where active = ?', [1]);
    }
}
