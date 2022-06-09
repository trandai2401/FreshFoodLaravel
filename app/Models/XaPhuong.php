<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    use HasFactory;
    protected $table = "xaphuong";


    public function quanHuyen()
    {
        return $this->belongsTo(QuanHuyen::class, 'quanhuyen_id', 'id');
    }
}
