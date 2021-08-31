<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\DanhMuc;
use App\SanPham;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    //
    function trangChu(Request $request){
        $danhMucs = DanhMuc::all();
        $ArrSanPham=[];
        foreach($danhMucs as $danhMuc){
            $sanphams = SanPham::where('DanhMucID',$danhMuc->IDDanhMuc)->get();
            if(sizeof($sanphams)>0)
            {
                $ArrSanPham[] = $sanphams;
            }
        }
        $sanPhamBanChays = ChiTietDonHang::selectRaw("sum(SoLuong) as sl, SanPhamID")
            ->groupBy('SanPhamID')
            ->orderBy('SoLuong', 'desc')
            ->limit(6)
            ->get();
        return view('khachHang.trangChu.trangChu',compact('danhMucs','sanPhamBanChays','ArrSanPham'));
    }
}
