<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\Donhang;
use App\KhachHang;
use App\SanPham;
use Illuminate\Http\Request;

class AdminDonHangController extends Controller
{
    //
    function donHangThanhCong(Request $request){
        $donHangs = Donhang::where('TrangThai','Thành Công')->get();
        return view('admin.donHang.danhSachDonHangThanhCong',compact('donHangs'));
    }

    function donHangXuLy(Request $request){
        $donHangs = Donhang::where('TrangThai','Chờ Xử Lý')->get();
        return view('admin.donHang.danhSachDonHangXuLy',compact('donHangs'));
    }

    function chiTietDonHang(Request $request){
        $donHang = Donhang::where('IDDonHang',$request->id)->first();
        $chiTietDonHangs = ChiTietDonHang::where('DonHangID',$request->id)->get();
        return view('admin.donHang.ChiTietDonhang',compact('donHang','chiTietDonHangs'));
    }

    function huyDonHang(Request $request){
        Donhang::where('IDDonHang', $request->id)->update([
            'TrangThai'=>"Hủy",
        ]);
        session()->put('messHuy',"thanh cong");
        return redirect('admin/chi-tiet-don-hang/'.$request->id);
    }

    function xacNhanDonHang(Request $request){

        Donhang::where('IDDonHang', $request->id)->update([
            'TrangThai'=>"Thành Công",
            'NhanVienID'=>session()->get('nhanvien')->IDNhanVien,
        ]);

        $chiTietDonHangs = ChiTietDonHang::where("DonHangID",$request->id)->get();
        foreach($chiTietDonHangs as $chiTietDonHang){
            SanPham::where('IDSanPham',$chiTietDonHang->SanPhamID)->update([
                'SoLuong' => SanPham::where('IDSanPham',$chiTietDonHang->SanPhamID)->first()->SoLuong - $chiTietDonHang->SoLuong,
            ]);
        }

        session()->put('messXacNhan',"thanh cong");
        return redirect('admin/chi-tiet-don-hang/'.$request->id);
    }

    function themDonHang(Request $request){
        $sanphams = SanPham::where('SoLuong','>',0)->get();
        $khachhangs = KhachHang::all();
        return view('admin.donHang.themDonHang',compact('sanphams', 'khachhangs'));
    }
    function themDonHangP (Request $request){
        $request->validate(
            [
                'sanpham' => 'required',

            ],
            [
                'required' => ":attribute ",
            ],
            [

                'sanpham' => 'Cần Chọn Ít Nhất 1 Sản phẩm',
            ]
        );
        $KhachHangID = null;
        if (!empty($request->KhachHangID)) $KhachHangID = $request->KhachHangID;

        $tongtien = 0;
        $soluong = 0;
        foreach ($request->sanpham as $sanphammua) {
            $soluong += $request->slsp[$sanphammua];
            $tongtien += SanPham::where('IDSanPham',$sanphammua)->first()->GiaBan * $request->slsp[$sanphammua];
            // echo $sanphammua;
        }
        $maDonHang = Donhang::max('IDDonHang');
        if ($maDonHang == null) $maDonHang = 1;
        else $maDonHang += 1;
        DonHang::create([
            'MaDonHang'=>$maDonHang,
            'SoLuong' => $soluong,
            'TongTien' => $tongtien,
            'KhachHangID' => $KhachHangID,
            'NhanVienID' => session()->get('nhanvien')->IDNhanVien,
            'TrangThai' => 'Thành Công',
            'ChuThich'=>null,
        ]);

        $max = Donhang::max('IDDonHang');

        foreach ($request->sanpham as $sanphammua) {
            $tt = SanPham::where('IDSanPham',$sanphammua)->first()->GiaBan * $request->slsp[$sanphammua];

            ChiTietDonHang::create([
                'SoLuong' => $request->slsp[$sanphammua],
                'TongTien' => $tt,
                'SanPhamID' => $sanphammua,
                'DonHangID' => $max,
                'DonGia' =>SanPham::where('IDSanPham',$sanphammua)->first()->GiaBan,
            ]);
            $soluong = SanPham::where('IDSanPham',$sanphammua)->first()->SoLuong;

            SanPham::where('IDSanPham', $sanphammua)
                ->update([
                    'SoLuong' => $soluong - $request->slsp[$sanphammua],
                ]);
        }

        
        return redirect("/admin/chi-tiet-don-hang/".$max);
    }
}
