<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;

class AdminSanPhamController extends Controller
{
    //
    function themSanPham(Request $request)
    {
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        return view('admin.sanPham.themSanPham', compact('danhMucs', 'thuongHieus'));
    }

    function danhSachSanPham(Request $request)
    {
        $sanPhams = SanPham::all();
        return view('admin.sanPham.danhSachSanPham', compact('sanPhams'));
    }

    function themSanPhamP(Request $request)
    {
        $request->validate(
            [
                'TenSanPham' => 'required',
                'ImgSanPham' => 'required',
                'GiaBan' => 'required',
                'MoTa' => 'required',
                'DanhMucID' => 'required',
                'ThuongHieuID' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenSanPham' => 'Tên Sản Phẩm',
                'ImgSanPham' => 'Ảnh Sản Phẩm',
                'GiaBan' => 'Giá Bán Sản Phẩm',
                'MoTa' => 'Mô Tả Sản Phẩm',
                'DanhMucID' => 'Danh Mục Sản Phẩm',
                'ThuongHieuID' => 'Thương Hiệu Sản Phẩm',

            ]
        );
        $request->ImgSanPham->move('public/uploads', $request->ImgSanPham->getClientOriginalName());
        $url = 'public/uploads/' . $request->ImgSanPham->getClientOriginalName();
        $maSanPham = SanPham::max('IDSanPham');
        if ($maSanPham == null) $maSanPham = 1;
        else $maSanPham += 1;

        SanPham::create([
            'MaSanPham' => "SP_" . $maSanPham,
            'TenSanPham' => $request->TenSanPham,
            'ImgSanPham' => $url,
            'GiaBan' => $request->GiaBan,
            'MoTa' => $request->MoTa,
            'DanhMucID' => $request->DanhMucID,
            'ThuongHieuID' => $request->ThuongHieuID,
            'SoLuong' => 0,
        ]);
        $request->session()->put('messThemSanPham', "Thành Công !!!");
        return redirect()->route('admin.danhSachSanPham');
    }

    function xoaSanPham(Request $request)
    {
        $url = SanPham::where('IDSanPham', $request->id)->first()->ImgSanPham;
        unlink($url);
        SanPham::where('IDSanPham', $request->id)->delete();
        $request->session()->put('messXoaSanPham', "Thành Công !!!");
        return redirect()->route('admin.danhSachSanPham');
    }

    function suaSanPham(Request $request)
    {
        $danhMucs = DanhMuc::all();
        $thuongHieus = ThuongHieu::all();
        $sanPham = SanPham::where('IDSanPham', $request->id)->first();
        return view('admin.sanPham.suaSanPham', compact('sanPham','danhMucs','thuongHieus'));
    }

    function suaSanPhamP(Request $request)
    {
        $request->validate(
            [
                'TenSanPham' => 'required',
                'GiaBan' => 'required',
                'MoTa' => 'required',
                'DanhMucID' => 'required',
                'ThuongHieuID' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenSanPham' => 'Tên Sản Phẩm',
                'GiaBan' => 'Giá Bán Sản Phẩm',
                'MoTa' => 'Mô Tả Sản Phẩm',
                'DanhMucID' => 'Danh Mục Sản Phẩm',
                'ThuongHieuID' => 'Thương Hiệu Sản Phẩm',

            ]
        );
        $url = "";
        if ($request->ImgSanPham == null) {
            $url = $request->ImgSanPham2;
        } else {
            unlink($request->ImgSanPham2);
            $request->ImgSanPham->move('public/uploads', $request->ImgSanPham->getClientOriginalName());
            $url = 'public/uploads/' . $request->ImgSanPham->getClientOriginalName();
        }

        SanPham::where('IDSanPham', $request->id)->update([
            'TenSanPham' => $request->TenSanPham,
            'ImgSanPham' => $url,
            'GiaBan' => $request->GiaBan,
            'MoTa' => $request->MoTa,
            'DanhMucID' => $request->DanhMucID,
            'ThuongHieuID' => $request->ThuongHieuID,
        ]);
        $request->session()->put('messCapNhatSanPham', "Thành Công !!!");
        return redirect()->route('admin.danhSachSanPham');
    }
}
