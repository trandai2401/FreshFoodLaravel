<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemgiohang extends Model
{
    use HasFactory;
    protected $table = "itemgiohang";

    public function nongsan()
    {
        return $this->belongsTo(nongsan::class, 'id_nongsan', 'id');
    }
}
