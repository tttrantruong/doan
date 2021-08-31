<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use Illuminate\Http\Request;

class AdminDanhMucController extends Controller
{
    //
    function themDanhMuc(Request $request){
        return view('admin.danhMuc.themDanhMuc');
    }

    function danhSachDanhMuc(Request $request){
        $danhMucs = DanhMuc::all();
        return view("admin.danhMuc.danhSachDanhMuc",compact('danhMucs'));
    }

    function themDanhMucP(Request $request){
        $request->validate(
            [
                'TenDanhMuc' => 'required',
                'MoTaDanhMuc' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenDanhMuc' => 'Tên Danh Mục ',
                'MoTaDanhMuc' => 'Mô Tả Danh Mục',
            ]
        );

        DanhMuc::create([
            'TenDanhMuc' =>$request->TenDanhMuc,
            'MoTaDanhMuc' =>$request->MoTaDanhMuc,
        ]);
        $request->session()->put('messThemDanhMuc', "Thành Công !!!");
        return redirect()->route('admin.danhSachDanhMuc');

    }

    function xoaDanhMuc(Request $request){
        DanhMuc::where("IDDanhMuc", $request->id)->delete();
        $request->session()->put('messXoaDanhMuc', "Thành Công !!!");
        return redirect()->route('admin.danhSachDanhMuc');
    }
    
    function suaDanhMuc(Request $request){
        $danhMuc = DanhMuc::where('IDDanhMuc',$request->id)->first();
        return view('admin.danhMuc.suaDanhMuc',compact('danhMuc'));
    }

    function suaDanhMucP(Request $request){
        $request->validate(
            [
                'TenDanhMuc' => 'required',
                'MoTaDanhMuc' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenDanhMuc' => 'Tên Danh Mục ',
                'MoTaDanhMuc' => 'Mô Tả Danh Mục',
            ]
        );

        DanhMuc::where('IDDanhMuc',$request->id)->update([
            'TenDanhMuc' =>$request->TenDanhMuc,
            'MoTaDanhMuc' =>$request->MoTaDanhMuc,
        ]);
        $request->session()->put('messCapNhatDanhMuc', "Thành Công !!!");
        return redirect()->route('admin.danhSachDanhMuc');
    }
}
