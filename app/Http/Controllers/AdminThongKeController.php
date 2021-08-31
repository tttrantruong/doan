<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\Donhang;
use Illuminate\Http\Request;

class AdminThongKeController extends Controller
{
    //
    function thongKeDoanhThu(Request $request)
    {
        return view('admin.thongKe.doanhThu');
    }

    function thongKeDoanhThuP(Request $request){
        $request->validate(
            [
                'batdau' => 'required',
                'ketthuc' => 'required',
            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
            'batdau' => 'Ngày Bắt Đầu ',
            'ketthuc' => 'Ngày Kết Thúc ',
            
            ]
        );


        $tongthu = Donhang::where([
            [
                'TrangThai','Thành Công',
            ],
            [
                'created_at' ,'>',$request->batdau,
            ],
            [
                'created_at' ,'<',$request->ketthuc,
            ]
        ])->sum('TongTien');
        
        $ngaybd = $request->batdau;
        $ngaykt =$request->ketthuc;

        return view('admin.thongKe.doanhThu',compact('tongthu','ngaybd','ngaykt'));
    }

    function thongKeSanPham(Request $request)
    {
        return view('admin.thongKe.sanPham');
    }

    function thongKeSanPhamP(Request $request){
        $request->validate(
            [
                'batdau' => 'required',
                'ketthuc' => 'required',
            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'batdau' => 'Ngày Bắt Đầu ',
                'ketthuc' => 'Ngày Kết Thúc ',

            ]
        );

        // SELECT sum(soluong) as soluong, sp_id FROM `chi_tiet_don_hangs` GROUP BY sp_id ORDER BY soluong desc limit 1
        $ds = ChiTietDonHang::selectRaw("sum(SoLuong) as sl, SanPhamID")
            ->where([
                [
                    'created_at', '>', $request->batdau,
                ],
                [
                    'created_at', '<', $request->ketthuc,
                ]
            ])
            ->groupBy('SanPhamID')
            ->orderBy('SoLuong', 'desc')
            ->limit(5)
            ->get();
        $ngaybt = $request->batdau;
        $ngaykt = $request->ketthuc;
        // return $ds;
        return view('admin.thongKe.sanPham', compact("ds", 'ngaybt', 'ngaykt'));
    }
}
