<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $table = "hoadon";

    public function itemHoaDon()
    {
        return $this->hasMany(itemHoaDon::class, 'id_hoadon', 'id');
    }

    public function tongTienHoaDon()
    {
    }
    public function trangThai()
    {
        return $this->belongsTo(trangthai::class, 'id_trangthai', 'id');
    }
}
