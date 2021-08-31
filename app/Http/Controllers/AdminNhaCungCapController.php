<?php

namespace App\Http\Controllers;

use App\NhaCungCap;
use Illuminate\Http\Request;

class AdminNhaCungCapController extends Controller
{
    //
    function themNhaCungCap(Request $request){
        return view('admin.nhaCungCap.themNhaCungCap');
    }

    function danhSachNhaCungCap(Request $request){
        $nhaCungCaps = NhaCungCap::all();
        return view("admin.nhaCungCap.danhSachNhaCungCap",compact('nhaCungCaps'));
    }

    function themNhaCungCapP(Request $request){
        $request->validate(
            [
                'TenNhaCungCap' => 'required',
                'SDTNhaCungCap' => 'required',
                'MailNhaCungCap' => 'required',
                'DiaChiNhaCungCap' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenNhaCungCap' => 'Tên Nhà Cung Cấp',
                'SDTNhaCungCap' => 'Số Điện Thoại Nhà Cung Cấp',
                'MailNhaCungCap' => 'Mail Nhà Cung Cấp',
                'DiaChiNhaCungCap' => 'Địa Chỉ Nhà Cung Cấp',
            ]
        );

        $maNhaCungCap = NhaCungCap::max('IDNhaCungCap');
        if ($maNhaCungCap == null) $maNhaCungCap = 1;
        else $maNhaCungCap += 1;

        NhaCungCap::create([
            'MaNhaCungCap' =>'NCC_'.$maNhaCungCap,
            'TenNhaCungCap' =>$request->TenNhaCungCap,
            'SDTNhaCungCap' =>$request->SDTNhaCungCap,
            'MailNhaCungCap' =>$request->MailNhaCungCap,
            'DiaChiNhaCungCap' =>$request->DiaChiNhaCungCap,
        ]);
        $request->session()->put('messThemNhaCungCap', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhaCungCap');
    }

    function xoaNhaCungCap(Request $request){
        NhaCungCap::where('IDNhaCungCap',$request->id)->delete();
        $request->session()->put('messXoaNhaCungCap', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhaCungCap');
    }

    function suaNhaCungCap(Request $request){
        $nhaCungCap = NhaCungCap::where('IDNhaCungCap', $request->id)->first();
        return view('admin.nhaCungCap.suaNhaCungCap',compact('nhaCungCap'));
    }

    function suaNhaCungCapP(Request $request){
        $request->validate(
            [
                'TenNhaCungCap' => 'required',
                'SDTNhaCungCap' => 'required',
                'MailNhaCungCap' => 'required',
                'DiaChiNhaCungCap' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenNhaCungCap' => 'Tên Nhà Cung Cấp',
                'SDTNhaCungCap' => 'Số Điện Thoại Nhà Cung Cấp',
                'MailNhaCungCap' => 'Mail Nhà Cung Cấp',
                'DiaChiNhaCungCap' => 'Địa Chỉ Nhà Cung Cấp',
            ]
        );

        NhaCungCap::where('IDNhaCungCap',$request->id)->update([
            'TenNhaCungCap' =>$request->TenNhaCungCap,
            'SDTNhaCungCap' =>$request->SDTNhaCungCap,
            'MailNhaCungCap' =>$request->MailNhaCungCap,
            'DiaChiNhaCungCap' =>$request->DiaChiNhaCungCap,
        ]);
        $request->session()->put('messCapNhatNhaCungCap', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhaCungCap');
    }
}
