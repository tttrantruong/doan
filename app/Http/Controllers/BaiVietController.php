<?php

namespace App\Http\Controllers;

use App\BaiViet;
use App\ChiTietDonHang;
use App\SanPham;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    //
    function danhSachBaiViet(Request $request){
        $baiViets = BaiViet::paginate(5);
        $sanPhamBanChays = ChiTietDonHang::selectRaw("sum(SoLuong) as sl, SanPhamID")
            ->groupBy('SanPhamID')
            ->orderBy('SoLuong', 'desc')
            ->limit(6)
            ->get();
        return view('khachHang.baiViet.danhSachBaiViet',compact('baiViets','sanPhamBanChays'));
    }

    function chiTietBaiViet(Request $request){
        $baiViet = BaiViet::where('IDBaiViet',$request->id)->first();
        $sanPhamBanChays = ChiTietDonHang::selectRaw("sum(SoLuong) as sl, SanPhamID")
            ->groupBy('SanPhamID')
            ->orderBy('SoLuong', 'desc')
            ->limit(6)
            ->get();
        return view('khachHang.baiViet.chiTietBaiViet',compact('baiViet','sanPhamBanChays'));
    }
}
