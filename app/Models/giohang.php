<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class giohang extends Model
{
    use HasFactory;
    protected $table = "giohang";

    public function gioHang()
    {
        return $this->hasMany(itemGioHang::class, 'id_giohang', 'id');
    }
    public function tongTienGioHang($id)
    {
        $res = DB::select('SELECT  sum(itgh.soluong*ns.gia) as tong FROM itemgiohang as itgh, nongsan as ns where itgh.id_nongsan = ns.id and itgh.id_giohang = ' . $id . ' ;');
        if ($res[0]->tong != null)
            return   $res[0]->tong;
        else return 0;
    }
}
