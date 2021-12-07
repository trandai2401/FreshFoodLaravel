<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nongsan extends Model
{
    use HasFactory;
    protected $table = "nongsan";


    public function danhmuc()
    {
        return $this->belongsTo(danhmuc::class, 'id_danhmuc', 'id');
    }

    public function hinhanh()
    {
        return $this->hasMany(hinhanh::class, 'id_nongsan', 'id');
    }
}
