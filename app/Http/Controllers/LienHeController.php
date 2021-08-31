<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LienHeController extends Controller
{
    //
    function lienHe(Request $request){
        return view('khachHang.lienHe.lienHe');
    }
}
