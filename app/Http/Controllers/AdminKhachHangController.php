<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;

class AdminKhachHangController extends Controller
{
    //
    function themKhachHang(Request $request)
    {
        return view('admin.khachHang.themKhachHang');
    }

    function danhSachKhachHang(Request $request)
    {
        $khachHangs = KhachHang::all();
        return view("admin.khachHang.danhSachKhachHang", compact('khachHangs'));
    }

    function themKhachHangP(Request $request)
    {
        $request->validate(
            [
                'TenKhachHang' => 'required',
                'SDTKhachHang' => 'required',
                'MailKhachHang' => 'required',
                'DiaChiKhachHang' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenKhachHang' => 'Tên Khách Hàng',
                'SDTKhachHang' => 'Số Điện Thoại Khách Hàng',
                'MailKhachHang' => 'Mail Khách Hàng',
                'DiaChiKhachHang' => 'Địa Chỉ Khách Hàng',
            ]
        );

        $maKhachHang = KhachHang::max('IDKhachHang');
        if ($maKhachHang == null) $maKhachHang = 1;
        else $maKhachHang += 1;

        KhachHang::create([
            'MaKhachHang' => 'KH_'.$maKhachHang,
            'TenKhachHang' => $request->TenKhachHang,
            'SDTKhachHang' => $request->SDTKhachHang,
            'MailKhachHang' => $request->MailKhachHang,
            'DiaChiKhachHang' => $request->DiaChiKhachHang,
        ]);
        $request->session()->put('messThemKhachHang', "Thành Công !!!");
        return redirect()->route('admin.danhSachKhachHang');
    }

    function xoaKhachHang(Request $request)
    {
        KhachHang::where('IDKhachHang', $request->id)->delete();
        $request->session()->put('messXoaKhachHang', "Thành Công !!!");
        return redirect()->route('admin.danhSachKhachHang');
    }

    function suaKhachHang(Request $request)
    {
        $khachHang = KhachHang::where('IDKhachHang', $request->id)->first();
        return view('admin.khachHang.suaKhachHang', compact('khachHang'));
    }

    function suaKhachHangP(Request $request)
    {
        $request->validate(
            [
                'TenKhachHang' => 'required',
                'SDTKhachHang' => 'required',
                'MailKhachHang' => 'required',
                'DiaChiKhachHang' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenKhachHang' => 'Tên Khách Hàng',
                'SDTKhachHang' => 'Số Điện Thoại Khách Hàng',
                'MailKhachHang' => 'Mail Khách Hàng',
                'DiaChiKhachHang' => 'Địa Chỉ Khách Hàng',
            ]
        );

        KhachHang::where('IDKhachHang', $request->id)->update([
            'TenKhachHang' => $request->TenKhachHang,
            'SDTKhachHang' => $request->SDTKhachHang,
            'MailKhachHang' => $request->MailKhachHang,
            'DiaChiKhachHang' => $request->DiaChiKhachHang,
        ]);
        $request->session()->put('messCapNhatKhachHang', "Thành Công !!!");
        return redirect()->route('admin.danhSachKhachHang');
    }
}
