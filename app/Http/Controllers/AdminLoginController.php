<?php

namespace App\Http\Controllers;

use App\NhanVien;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    function dangNhap(Request $request)
    {
        return view('admin.taiKhoan.dangNhap');
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

        $nhanVien = NhanVien::where([
            [
                'Username' , $request->Username,
            ],
            [
                'Password' , $request->Password,
            ]
        ])->first();

        if(empty($nhanVien)){
            return redirect()->route('admin.dangNhap');
        }
        $request->session()->put('nhanvien',$nhanVien);
        return redirect()->route('admin.home');
    }

    function dangXuat(Request $request){
        $request->session()->forget('nhanvien');
        return redirect()->route('admin.dangNhap');
    }
}
