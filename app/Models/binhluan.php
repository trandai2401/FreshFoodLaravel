<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    use HasFactory;
    protected $table = "danhgia";


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
