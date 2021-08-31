<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    function danhSachSanPham(Request $request){
        $sanPhams = SanPham::where('SoLuong','>',0)->paginate(12);
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        return view('khachHang.sanPham.danhSachSanPham',compact('sanPhams','danhMucs','thuongHieus'));
    }

    function danhSachSanPhamP(Request $request){
        $sanPhams = SanPham::where([
            ['SoLuong','>',0],['DanhMucID',$request->id]
        ])->paginate(12);
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        return view('khachHang.sanPham.danhSachSanPham',compact('sanPhams','danhMucs','thuongHieus'));
    }

    function danhSachSanPhamPP(Request $request){
        $sanPhams = SanPham::where([
            ['SoLuong','>',0],['ThuongHieuID',$request->id]
        ])->paginate(12);
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        return view('khachHang.sanPham.danhSachSanPham',compact('sanPhams','danhMucs','thuongHieus'));
    }

    function chiTietSanPham(Request $request){
        $danhMucs =DanhMuc::all();
        $sanPham = SanPham::where('IDSanPham', $request->id)->first();
        $idDanhMuc = SanPham::where("DanhMucID",$sanPham->DanhMucID)->first()->DanhMucID;
        $sanPhamLienQuans = SanPham::where('DanhMucID',$idDanhMuc)->get();
        return view('khachHang.sanPham.chiTietSanPham',compact('sanPham','danhMucs','sanPhamLienQuans'));
    }
}
