<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;

class TimKiemController extends Controller
{
    //
    function timKiem(Request $request){
        $sanPhams = SanPham::where('TenSanPham','like',"%$request->key%")->paginate(12);
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        return view('khachHang.sanPham.danhSachSanPham',compact('sanPhams','danhMucs','thuongHieus'));
    }
}
