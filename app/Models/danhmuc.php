<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table = "danhmuc";



    public function nongsan()
    {
        return $this->hasMany(nongsan::class, 'id_danhmuc', 'id');
    }


    public function getNongSanLimit($id_danhmuc)
    {

        return nongsan::select("*")->where('id_danhmuc', $id_danhmuc)->where('soluong', '>', 0)->limit(4)->get();
    }
}
