<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    use HasFactory;
    protected $table = "quanhuyen";


    public function tinhThanh()
    {
        return $this->belongsTo(TinhThanh::class, 'tinhthanh_id', 'id');
    }
}
