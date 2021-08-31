<?php

namespace App\Http\Controllers;

use App\DonHangNhap;
use App\NhaCungCap;
use App\SanPham;
use Illuminate\Http\Request;

class AdminNhapHangController extends Controller
{
    //
    function nhapHang(Request $request)
    {
        $sanPhams = SanPham::all();
        return view('admin.nhapHang.danhSach', compact('sanPhams'));
    }

    function nhapHangP(Request $request)
    {
        $sanPham = SanPham::where('IDSanPham', $request->id)->first();
        $nhaCungCaps =  NhaCungCap::all();
        return view('admin.nhapHang.nhapHang', compact('sanPham', 'nhaCungCaps'));
    }

    function nhapHangPP(Request $request)
    {
        // return $request;
        $maDonHangNhap = DonHangNhap::max('IDDonHangNhap');
        if ($maDonHangNhap == null) $maDonHangNhap = 1;
        else $maDonHangNhap += 1;
        DonHangNhap::create([
            'MaDonHangNhap' =>'DHN_'.$maDonHangNhap,
            'SoLuong' =>$request->SoLuong,
            'GiaNhap' =>$request->GiaNhap,
            'TongTien' => $request->SoLuong * $request->GiaNhap,
            'NhaCungCapID' => $request->NhaCungCapID,
            'SanPhamID' => $request->SanPhamID,
        ]);
        SanPham::where('IDSanPham',$request->SanPhamID)->update([
            'SoLuong' => SanPham::where('IDSanPham',$request->SanPhamID)->first()->SoLuong + $request->SoLuong,
        ]);
        $request->session()->put('messNhapHang', "Thành Công !!!");
        return redirect()->route('DanhSachDonHangNhap');
    }

    function ChiTietDonHangNhap(Request $request){
        $donHangNhap = DonHangNhap::where('IDDonHangNhap', $request->id)->first();
        return view('admin.nhapHang.ChiTietDonHangNhap',compact('donHangNhap'));

    }

    function DanhSachDonHangNhap(Request $request){
        $donHangNhaps = DonHangNhap::all();
        return view('admin.nhapHang.DanhSachDonHangNhap',compact('donHangNhaps'));
    }
}
