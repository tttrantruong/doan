<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\Donhang;
use App\GioHang;
use App\SanPham;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    //
    function thanhToan(Request $request){
        $gioHangs = GioHang::where('KhachHangID', session()->get('khachHang')->IDKhachHang)->get();
        return view('khachHang.thanhToan.thanhToan',compact('gioHangs'));
    }

    function thanhToanP(Request $request){

        $gioHangs = GioHang::where('KhachHangID', session()->get('khachHang')->IDKhachHang)->get();

        $tt =0;
        $sl=0;
        foreach($gioHangs as $gioHang){
            $sl += $gioHang->SoLuong;
            $tt += $gioHang->SoLuong * SanPham::where('IDSanPham', $gioHang->SanPhamID)->first()->GiaBan;
        }
        $maDonHang = Donhang::max('IDDonHang');
        if ($maDonHang == null) $maDonHang = 1;
        else $maDonHang += 1;
        Donhang::create([
            'MaDonHang' => 'DH_'.$maDonHang,
            'TrangThai' => 'Chờ Xử Lý',
            'SoLuong' => $sl,
            'TongTien' => $tt,
            'ChuThich' => $request->ChuThich,
            'KhachHangID' => session()->get('khachHang')->IDKhachHang,
            'NhanVienID' => null,
        ]);

        $max = Donhang::max('IDDonHang');
        foreach($gioHangs as $gioHang){
            ChiTietDonHang::create([
                'SoLuong'=>$gioHang->SoLuong,
                'DonGia'=>SanPham::where('IDSanPham', $gioHang->SanPhamID)->first()->GiaBan,
                'TongTien'=>$gioHang->SoLuong * SanPham::where('IDSanPham', $gioHang->SanPhamID)->first()->GiaBan,
                'SanPhamID'=> $gioHang->SanPhamID,
                'DonHangID'=>$max,
            ]);

            GioHang::where('IDGioHang', $gioHang->IDGioHang)->delete();

        }
        $request->session()->put('messThanhToan', "Thành Công !!!");
        return redirect()->route('thanhToan');
    }
}
