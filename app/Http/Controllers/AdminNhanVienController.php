<?php

namespace App\Http\Controllers;

use App\NhanVien;
use Illuminate\Http\Request;

class AdminNhanVienController extends Controller
{
    //
    function themNhanVien(Request $request)
    {
        return view('admin.nhanVien.themNhanVien');
    }

    function danhSachNhanVien(Request $request)
    {
        $nhanViens = NhanVien::all();
        return view("admin.nhanVien.danhSachNhanVien", compact('nhanViens'));
    }

    function themNhanVienP(Request $request)
    {
        $request->validate(
            [
                'TenNhanVien' => 'required',
                'SDTNhanVien' => 'required',
                'MailNhanVien' => 'required',
                'ImgNhanVien' => 'required',
                'Username' => 'required',
                'Password' => 'required',
                'Role' => 'required',
                'DiaChiNhanVien' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenNhanVien' => 'Tên Nhân Viên ',
                'SDTNhanVien' => 'Số Điện Thoại Nhân Viên',
                'MailNhanVien' => 'Mail Nhân Viên',
                'ImgNhanVien' => 'Ảnh Nhân Viên',
                'Username' => 'Tên Tài Khoản',
                'Password' => 'Mật Khẩu Tài Khoản',
                'Role' => 'Chức Vụ ',
                'DiaChiNhanVien' => 'Địa Chỉ Nhân Viên',
            ]
        );
        $request->ImgNhanVien->move('public/uploads', $request->ImgNhanVien->getClientOriginalName());
        $url = 'public/uploads/' . $request->ImgNhanVien->getClientOriginalName();
        $maNhanVien = NhanVien::max('IDNhanVien');
        if ($maNhanVien == null) $maNhanVien = 1;
        else $maNhanVien += 1;

        NhanVien::create([
            'MaNhanVien' => "NV_" . $maNhanVien,
            'TenNhanVien' => $request->TenNhanVien,
            'SDTNhanVien' => $request->SDTNhanVien,
            'MailNhanVien' => $request->MailNhanVien,
            'ImgNhanVien' => $url,
            'Username' => $request->Username,
            'Password' => $request->Password,
            'Role' => $request->Role,
            'DiaChiNhanVien' => $request->DiaChiNhanVien,
            'Active' => 'Chưa Kích Hoạt',
        ]);
        $request->session()->put('messThemNhanVien', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhanVien');
    }

    function xoaNhanVien(Request $request)
    {
        $url = NhanVien::where('IDNhanVien', $request->id)->first()->ImgNhanVien;
        unlink($url);
        NhanVien::where('IDNhanVien', $request->id)->delete();
        $request->session()->put('messXoaNhanVien', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhanVien');
    }

    function suaNhanVien(Request $request)
    {
        $nhanVien = NhanVien::where('IDNhanVien', $request->id)->first();
        return view('admin.nhanVien.suaNhanVien', compact('nhanVien'));
    }

    function suaNhanVienP(Request $request)
    {
        $request->validate(
            [
                'TenNhanVien' => 'required',
                'SDTNhanVien' => 'required',
                'MailNhanVien' => 'required',
                'Username' => 'required',
                'Password' => 'required',
                'Role' => 'required',
                'DiaChiNhanVien' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenNhanVien' => 'Tên Nhân Viên ',
                'SDTNhanVien' => 'Số Điện Thoại Nhân Viên',
                'MailNhanVien' => 'Mail Nhân Viên',
                'Username' => 'Tên Tài Khoản',
                'Password' => 'Mật Khẩu Tài Khoản',
                'Role' => 'Chức Vụ ',
                'DiaChiNhanVien' => 'Địa Chỉ Nhân Viên',
            ]
        );
        $url = "";
        if ($request->ImgNhanVien == null) {
            $url = $request->ImgNhanVien2;
        } else {
            unlink($request->ImgNhanVien2);
            $request->ImgNhanVien->move('public/uploads', $request->ImgNhanVien->getClientOriginalName());
            $url = 'public/uploads/' . $request->ImgNhanVien->getClientOriginalName();
        }

        NhanVien::where('IDNhanVien',$request->id)->update([
            'TenNhanVien' => $request->TenNhanVien,
            'SDTNhanVien' => $request->SDTNhanVien,
            'MailNhanVien' => $request->MailNhanVien,
            'ImgNhanVien' => $url,
            'Username' => $request->Username,
            'Password' => $request->Password,
            'Role' => $request->Role,
            'DiaChiNhanVien' => $request->DiaChiNhanVien,
        ]);
        $request->session()->put('messCapNhatNhanVien', "Thành Công !!!");
        return redirect()->route('admin.danhSachNhanVien');
    }

    function danhSachTaiKhoan(Request $request){
        $nhanViens = NhanVien::all();
        return view("admin.nhanVien.danhSachTaiKhoan", compact('nhanViens'));
    }

    function KhoaTaiKhoan(Request $request){
        NhanVien::where('IDNhanVien',$request->id)->update([
            'Active'=>"Không Hoạt Động",
        ]);
        return redirect()->route('admin.danhSachTaiKhoan');
    }

    function KichHoatTaiKhoan(Request $request){
        NhanVien::where('IDNhanVien',$request->id)->update([
            'Active'=>"Hoạt Động",
        ]);
        return redirect()->route('admin.danhSachTaiKhoan');
    }
}
