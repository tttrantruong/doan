<?php

namespace App\Http\Controllers;

use App\Donhang;
use App\KhachHang;
use App\NhanVien;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    function home(Request $request){
        $count_khachHang= KhachHang::count();
        $count_nhanVien = NhanVien::count();
        $count_donHang = Donhang::count();
        $tongThu = Donhang::where('TrangThai','Thành Công')->sum('TongTien');

        $tongthutheothang=[];
        $tiLe=[];
        $date= getdate();
        $nam = $date['year'];

        for($i=1; $i<=12;$i++){

            $tongthutheothang[$i]=Donhang::where('TrangThai', 'Thành Công')
                ->whereYear('created_at', $nam)
                ->whereMonth('created_at', $i)
                ->sum('TongTien');
            if($tongthutheothang[$i]>0)
                $tiLe[$i]= ($tongthutheothang[$i]/$tongThu) *100;
            else $tiLe[$i]=0;

        }

        $khachHangs = KhachHang::limit(5)->orderBy('IDKhachHang','desc')->get();
        $donHangs = Donhang::where('TrangThai','Chờ Xử Lý')->limit(5)->orderBy('IDDonHang','desc')->get();

        return view('admin.home',compact('count_khachHang','count_nhanVien','count_donHang','tongThu','tiLe','khachHangs','donHangs','nam'));
    }
}
