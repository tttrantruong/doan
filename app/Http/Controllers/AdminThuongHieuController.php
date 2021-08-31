<?php

namespace App\Http\Controllers;

use App\ThuongHieu;
use Illuminate\Http\Request;

class AdminThuongHieuController extends Controller
{
    //
    function themThuongHieu(Request $request)
    {
        return view('admin.thuongHieu.themThuongHieu');
    }

    function danhSachThuongHieu(Request $request)
    {
        $thuongHieus = ThuongHieu::all();
        return view("admin.thuongHieu.danhSachThuongHieu",compact('thuongHieus'));
    }

    function themThuongHieuP(Request $request)
    {
        $request->validate(
            [
                'TenThuongHieu' => 'required',
                'ImgThuongHieu' => 'required',
                'MoTaThuongHieu' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenThuongHieu' => 'Tên Thương Hiệu',
                'ImgThuongHieu' => 'Ảnh Thương Hiệu',
                'MoTaThuongHieu' => 'Mô Tả Thương Hiệu',
            ]
        );
        $request->ImgThuongHieu->move('public/uploads', $request->ImgThuongHieu->getClientOriginalName());
        $url = 'public/uploads/' . $request->ImgThuongHieu->getClientOriginalName();
        ThuongHieu::create([
            'TenThuongHieu' => $request->TenThuongHieu,
            'ImgThuongHieu' => $url,
            'MoTaThuongHieu' => $request->MoTaThuongHieu,
        ]);
        $request->session()->put('messThemThuongHieu', "Thành Công !!!");
        return redirect()->route('admin.danhSachThuongHieu');
    }

    function xoaThuongHieu(Request $request){
        $url = ThuongHieu::where('IDThuongHieu', $request->id)->first()->ImgThuongHieu;
        unlink($url);
        ThuongHieu::where('IDThuongHieu', $request->id)->delete();
        $request->session()->put('messXoaThuongHieu', "Thành Công !!!");
        return redirect()->route('admin.danhSachThuongHieu');
    }

    function suaThuongHieu(Request $request){
        $thuongHieu = ThuongHieu::where("IDThuongHieu", $request->id)->first();
        return view('admin.thuongHieu.suaThuongHieu',compact('thuongHieu'));
    }

    function suaThuongHieuP(Request $request){
        $request->validate(
            [
                'TenThuongHieu' => 'required',
                'MoTaThuongHieu' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenThuongHieu' => 'Tên Thương Hiệu',
                'MoTaThuongHieu' => 'Mô Tả Thương Hiệu',
            ]
        );
        $url = "";
        if ($request->ImgThuongHieu == null) {
            $url = $request->ImgThuongHieu2;
        } else {
            unlink($request->ImgThuongHieu2);
            $request->ImgThuongHieu->move('public/uploads', $request->ImgThuongHieu->getClientOriginalName());
            $url = 'public/uploads/' . $request->ImgThuongHieu->getClientOriginalName();
        }
        ThuongHieu::where('IDThuongHieu', $request->id)->update([
            'TenThuongHieu' => $request->TenThuongHieu,
            'ImgThuongHieu' => $url,
            'MoTaThuongHieu' => $request->MoTaThuongHieu,
        ]);
        $request->session()->put('messCapNhatThuongHieu', "Thành Công !!!");
        return redirect()->route('admin.danhSachThuongHieu');
    }
}
