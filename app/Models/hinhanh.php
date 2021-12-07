<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    use HasFactory;
    protected $table = "hinhanh";

    public function nongsan()
    {
        return $this->belongsTo(nongsan::class, 'id_nongsan', 'id');
    }
}
