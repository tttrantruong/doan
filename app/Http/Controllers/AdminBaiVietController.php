<?php

namespace App\Http\Controllers;

use App\BaiViet;
use Illuminate\Http\Request;

class AdminBaiVietController extends Controller
{
    //
    function themBaiViet(Request $request)
    {
        return view('admin.baiViet.themBaiViet');
    }

    function danhSachBaiViet(Request $request)
    {
        $baiViets = BaiViet::all();
        return view("admin.baiViet.danhSachBaiViet", compact('baiViets'));
    }

    function themBaiVietP(Request $request)
    {
        $request->validate(
            [
                'TieuDe' => 'required',
                'ImgBaiViet' => 'required',
                'MoTaNgan' => 'required',
                'NoiDung' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TieuDe' => 'Tiêu Đề Bài Viết',
                'ImgBaiViet' => 'Ảnh Bài Viết',
                'NoiDung' => 'Nội Dung Bài Viết',
                'MoTaNgan' => 'Mô Tả Ngắn Bài Viết',
            ]
        );
        $request->ImgBaiViet->move('public/uploads', $request->ImgBaiViet->getClientOriginalName());
        $url = 'public/uploads/' . $request->ImgBaiViet->getClientOriginalName();


        BaiViet::create([
            'TieuDe' => $request->TieuDe,
            'ImgBaiViet' => $url,
            'NoiDung' => $request->NoiDung,
            'MoTaNgan' => $request->MoTaNgan,
            'NhanVienID' => session()->get('nhanvien')->IDNhanVien,
        ]);
        $request->session()->put('messThemBaiViet', "Thành Công !!!");
        return redirect()->route('admin.danhSachBaiViet');
    }

    function xoaBaiViet(Request $request)
    {
        $url = BaiViet::where('IDBaiViet', $request->id)->first()->ImgBaiViet;
        unlink($url);
        BaiViet::where('IDBaiViet', $request->id)->delete();
        $request->session()->put('messXoaBaiViet', "Thành Công !!!");
        return redirect()->route('admin.danhSachBaiViet');
    }

    function suaBaiViet(Request $request)
    {
        $baiViet = BaiViet::where('IDBaiViet', $request->id)->first();
        return view('admin.baiViet.suaBaiViet',compact('baiViet'));
    }

    function suaBaiVietP(Request $request)
    {
        $request->validate(
            [
                'TieuDe' => 'required',
                'NoiDung' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TieuDe' => 'Tiêu Đề Bài Viết',
                'NoiDung' => 'Nội Dung Bài Viết',
            ]
        );
        $url = "";
        if ($request->ImgBaiViet == null) {
            $url = $request->ImgBaiViet2;
        } else {
            unlink($request->ImgBaiViet2);
            $request->ImgBaiViet->move('public/uploads', $request->ImgBaiViet->getClientOriginalName());
            $url = 'public/uploads/' . $request->ImgBaiViet->getClientOriginalName();
        }

        BaiViet::where('IDBaiViet',$request->id)->update([
            'TieuDe' => $request->TieuDe,
            'ImgBaiViet' => $url,
            'NoiDung' => $request->NoiDung,
        ]);
        $request->session()->put('messCapNhatBaiViet', "Thành Công !!!");
        return redirect()->route('admin.danhSachBaiViet');
    }
}
