<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    //
    static function fomatmoney($money){
        $money = number_format($money,0,',','.');
        return $money." đ";
    }
}
