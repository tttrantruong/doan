<?php

namespace App\Http\Controllers;

use App\GioHang;
use App\SanPham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    //
    function gioHang(Request $request){
        $gioHangs = GioHang::where('KhachHangID', session()->get('khachHang')->IDKhachHang)->get();
        return view('khachHang.gioHang.gioHang',compact('gioHangs'));
    }

    function themGioHang(Request $request){
        // return $request;
        $sanPham = SanPham::where("IDSanPham", $request->IDSanPham)->first();
        $thanhTien = $sanPham->GiaBan * $request->SoLuong;
       GioHang::create([
        'SoLuong'=> $request->SoLuong,
        'ThanhTien'=>$thanhTien,
        'SanPhamID'=>$request->IDSanPham,
        "KhachHangID"=>session()->get('khachHang')->IDKhachHang,
       ]);
       return redirect()->route('gioHang');
    }

    function xoaGioHang(Request $request){
        GioHang::where('KhachHangID',session()->get('khachHang')->IDKhachHang)->delete();
        return \redirect()->route('gioHang');
    }

    function xoaSanPhamGioHang(Request $request){
        GioHang::where([
            [
                'KhachHangID',session()->get('khachHang')->IDKhachHang
            ],
            [
                'SanPhamID',$request->id
            ]
        ])->delete();
        return \redirect()->route('gioHang');
    }

    function capNhat(Request $request){
        $check ="";
        // return $request;
        foreach($request->sanpham as $idsanpham){
            if($request->soluongsanpham[$idsanpham]==0){
                GioHang::where([
                    [
                        'KhachHangID',$request->session()->get('khachHang')->IDKhachHang
                    ],
                    [
                        'SanPhamID',$idsanpham
                    ]
                ])->delete();
            }
            else
            GioHang::where([
                [
                    'KhachHangID',$request->session()->get('khachHang')->IDKhachHang
                ],
                [
                    'SanPhamID',$idsanpham
                ]
            ])->update([
                'SoLuong'=>$request->soluongsanpham[$idsanpham],
                'ThanhTien'=>SanPham::where('IDSanPham',$idsanpham)->first()->GiaBan * $request->soluongsanpham[$idsanpham],
            ]);
        }
        return redirect()->route('gioHang');
    }
}
