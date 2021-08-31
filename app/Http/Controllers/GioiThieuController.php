<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioiThieuController extends Controller
{
    //
    function gioiThieu(Request $request){
        return view('khachHang.gioiThieu.gioiThieu');
    }
}
