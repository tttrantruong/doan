<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;

class DangNhapController extends Controller
{
    //
    function dangNhap(Request $request)
    {
        return view('khachHang.taiKhoan.taiKhoan');
    }

    function dangNhapP(Request $request)
    {
        $request->validate(
            [
                'Username' => 'required',
                'Password' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'Username' => 'Tên Tài Khoản',
                'Password' => 'Mật Khẩu',
            ]
        );
        $khachHang = KhachHang::where([
            [
                'Username', $request->Username,
            ],
            [
                'Password', $request->Password,
            ]
        ])->first();

        if(!empty($khachHang)){
            session()->put('khachHang',$khachHang);
            return redirect()->route('trangChu');
        }
        else {
            return redirect()->route('dangNhap');
        }

    }

    function dangKy(Request $request)
    {
        return view('khachHang.taiKhoan.taiKhoan');
    }

    function dangKyP(Request $request)
    {
        $request->validate(
            [
                'TenKhachHang' => 'required',
                'SDTKhachHang' => 'required',
                'MailKhachHang' => 'required',
                'DiaChiKhachHang' => 'required',
                'Username' => 'required',
                'Password' => 'required',

            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'TenKhachHang' => 'Tên Khách Hàng',
                'SDTKhachHang' => 'Số Điện Thoại Khách Hàng',
                'MailKhachHang' => 'Mail Khách Hàng',
                'DiaChiKhachHang' => 'Địa Chỉ Khách Hàng',
                'Username' => 'Tên Tài Khoản',
                'Password' => 'Mật Khẩu',
            ]
        );

        $maKhachHang = KhachHang::max('IDKhachHang');
        if ($maKhachHang == null) $maKhachHang = 1;
        else $maKhachHang += 1;

        KhachHang::create([
            'MaKhachHang' => 'KH_' . $maKhachHang,
            'TenKhachHang' => $request->TenKhachHang,
            'SDTKhachHang' => $request->SDTKhachHang,
            'MailKhachHang' => $request->MailKhachHang,
            'DiaChiKhachHang' => $request->DiaChiKhachHang,
            'Username' => $request->Username,
            'Password' => $request->Password,
        ]);
        $request->session()->put('messDangKy', "Thành Công !!!");
        return redirect()->route('dangKy');
    }

    function dangXuat(Request $request){
        session()->forget('khachHang');
        return redirect()->route('trangChu');
    }
}
