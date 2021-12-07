<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\danhmuc;
use App\Models\hinhanh;
use App\Models\nongsan;
use App\Models\role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class add extends Controller
{
    //
    public function hello()
    {

        $a = User::select('*')->get();

        return $a;
    }
}
