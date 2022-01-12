<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemhoadon extends Model
{
    use HasFactory;
    protected $table = "itemhoadon";

    public function nongSan()
    {
        return $this->belongsTo(nongsan::class, 'id_nongsan', 'id');
    }
}
