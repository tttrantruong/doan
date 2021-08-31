<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// khach hang 
Route::get('/', "TrangChuController@trangChu")->name('trangChu');
Route::post('/tim-kiem', "TimKiemController@timKiem")->name('timKiem');

Route::get('/dang-nhap', "DangNhapController@dangNhap")->name('dangNhap');
Route::post('/dang-nhap-p', "DangNhapController@dangNhapP")->name('dangNhapP');
Route::get('/dang-xuat', "DangNhapController@dangXuat")->name('dangXuat');

Route::get('/dang-ky', "DangNhapController@dangKy")->name('dangKy');
Route::post('/dang-ky-p', "DangNhapController@dangKyP")->name('dangKyP');


Route::get('/danh-sach-san-pham', "SanPhamController@danhSachSanPham")->name('danhSachSanPham');
Route::get('/danh-sach-san-pham/{id}', "SanPhamController@danhSachSanPhamP")->name('danhSachSanPhamP');
Route::get('/danh-sach-san-pham-thuong-hieu/{id}', "SanPhamController@danhSachSanPhamPP")->name('danhSachSanPhamPP');

Route::get('/chi-tiet-san-pham/{id}', "SanPhamController@chiTietSanPham")->name('chiTietSanPham');

Route::get('/danh-sach-bai-viet', "BaiVietController@danhSachBaiViet")->name('danhSachBaiViet');

Route::get('/chi-tiet-bai-viet/{id}', "BaiVietController@chiTietBaiViet")->name('chiTietBaiViet');

Route::get('/lien-he', "LienHeController@lienHe")->name('lienHe');

Route::get('/gioi-thieu', "GioiThieuController@gioiThieu")->name('gioiThieu');


//////////////////

Route::middleware('CheckKhachHangLogin')->group(function () {

    Route::get('/thanh-toan', "ThanhToanController@thanhToan")->name('thanhToan');
    Route::post('/thanh-toan-p', "ThanhToanController@thanhToanP")->name('thanhToanP');

    Route::get('/gio-hang', "GioHangController@gioHang")->name('gioHang');
    Route::post('/gio-hang/cap-nhat', "GioHangController@capNhat")->name('capNhat');
    Route::get('/gio-hang/xoa', "GioHangController@xoaGioHang")->name('xoaGioHang');
    Route::get('/gio-hang/xoa/{id}', "GioHangController@xoaSanPhamGioHang")->name('xoaSanPhamGioHang');
    Route::post('/gio-hang/them', "GioHangController@themGioHang")->name('themGioHang');

});


// quan ly


Route::middleware('CheckLogin', 'CheckRole')->group(function () {

    // thong ke 
    Route::get('/admin/thong-ke/doanh-thu', "AdminThongKeController@thongKeDoanhThu")->name('admin.thongKeDoanhThu');
    Route::post('/admin/thong-ke/doanh-thu-p', "AdminThongKeController@thongKeDoanhThuP")->name('admin.thongKeDoanhThuP');
    Route::get('/admin/thong-ke/san-pham', "AdminThongKeController@thongKeSanPham")->name('admin.thongKeSanPham');
    Route::post('/admin/thong-ke/san-pham-p', "AdminThongKeController@thongKeSanPhamP")->name('admin.thongKeSanPhamP');

    // nha cung cap
    Route::get('/admin/them-nha-cung-cap', "AdminNhaCungCapController@themNhaCungCap")->name('admin.themNhaCungCap');
    Route::get('/admin/danh-sach-nha-cung-cap', "AdminNhaCungCapController@danhSachNhaCungCap")->name('admin.danhSachNhaCungCap');
    Route::post('/admin/them-nha-cung-cap-p', "AdminNhaCungCapController@themNhaCungCapP")->name('admin.themNhaCungCapP');
    Route::get('/admin/xoa-nha-cung-cap/{id}', "AdminNhaCungCapController@xoaNhaCungCap")->name('admin.xoaNhaCungCap');
    Route::get('/admin/sua-nha-cung-cap/{id}', "AdminNhaCungCapController@suaNhaCungCap")->name('admin.suaNhaCungCap');
    Route::post('/admin/sua-nha-cung-cap-p', "AdminNhaCungCapController@suaNhaCungCapP")->name('admin.suaNhaCungCapP');


    // nhap hang 
    Route::get('/admin/nhap-hang','AdminNhapHangController@nhapHang')->name('nhapHang');
    Route::get('/admin/nhap-hang/{id}','AdminNhapHangController@nhapHangP')->name('nhapHangP');
    Route::post('/admin/nhap-hang-p','AdminNhapHangController@nhapHangPP')->name('nhapHangPP');

    Route::get('/admin/don-hang-nhap/{id}','AdminNhapHangController@ChiTietDonHangNhap')->name('ChiTietDonHangNhap');
    Route::get('/admin/don-hang-nhap','AdminNhapHangController@DanhSachDonHangNhap')->name('DanhSachDonHangNhap');


    // Quan ly Don Hang 
    Route::get('/admin/don-hang-thanh-cong','AdminDonHangController@donHangThanhCong')->name('donHangThanhCong');
    Route::get('/admin/don-hang-xu-ly','AdminDonHangController@donHangXuLy')->name('donHangXuLy');
    Route::get('/admin/chi-tiet-don-hang/{id}','AdminDonHangController@chiTietDonHang')->name('chiTietDonHang');
    Route::get('/admin/don-hang/huy/{id}','AdminDonHangController@huyDonHang')->name('huyDonHang');
    Route::get('/admin/don-hang/xac-nhan/{id}','AdminDonHangController@xacNhanDonHang')->name('xacNhanDonHang');

    Route::post('/admin/them-don-hang-p','AdminDonHangController@themDonHangP')->name('themDonHangP');
    Route::get('/admin/them-don-hang','AdminDonHangController@themDonHang')->name('themDonHang');


    // nhan vien
    Route::get('/admin/them-nhan-vien', "AdminNhanVienController@themNhanVien")->name('admin.themNhanVien');
    Route::get('/admin/xoa-nhan-vien/{id}', "AdminNhanVienController@xoaNhanVien")->name('admin.xoaNhanVien');
    Route::post('/admin/them-nhan-vien-p', "AdminNhanVienController@themNhanVienP")->name('admin.themNhanVienP');
    Route::get('/admin/sua-nhan-vien/{id}', "AdminNhanVienController@suaNhanVien")->name('admin.suaNhanVien');
    Route::post('/admin/sua-nhan-vien-p', "AdminNhanVienController@suaNhanVienP")->name('admin.suaNhanVienP');
    Route::get('/admin/danh-sach-nhan-vien', "AdminNhanVienController@danhSachNhanVien")->name('admin.danhSachNhanVien');

    Route::get('/admin/danh-sach-tai-khoan', "AdminNhanVienController@danhSachTaiKhoan")->name('admin.danhSachTaiKhoan');

    Route::get('/admin/tai-khoan/khoa/{id}', "AdminNhanVienController@KhoaTaiKhoan")->name('admin.KhoaTaiKhoan');
    Route::get('/admin/tai-khoan/kich-hoat/{id}', "AdminNhanVienController@KichHoatTaiKhoan")->name('admin.KichHoatTaiKhoan');

    
    
    // danh muc
    Route::get('/admin/them-danh-muc', "AdminDanhMucController@themDanhMuc")->name('admin.themDanhMuc');
    Route::post('/admin/them-danh-muc-p', "AdminDanhMucController@themDanhMucP")->name('admin.themDanhMucP');
    Route::get('/admin/danh-sach-danh-muc', "AdminDanhMucController@danhSachDanhMuc")->name('admin.danhSachDanhMuc');
    Route::get('/admin/xoa-danh-muc/{id}', "AdminDanhMucController@xoaDanhMuc")->name('admin.xoaDanhMuc');
    Route::get('/admin/sua-danh-muc/{id}', "AdminDanhMucController@suaDanhMuc")->name('admin.suaDanhMuc');
    Route::post('/admin/sua-danh-muc-p', "AdminDanhMucController@suaDanhMucP")->name('admin.suaDanhMucP');


    // thuong hieu
    Route::get('/admin/them-thuong-hieu', "AdminThuongHieuController@themThuongHieu")->name('admin.themThuongHieu');
    Route::post('/admin/them-thuong-hieu-p', "AdminThuongHieuController@themThuongHieuP")->name('admin.themThuongHieuP');
    Route::get('/admin/danh-sach-thuong-hieu', "AdminThuongHieuController@danhSachThuongHieu")->name('admin.danhSachThuongHieu');
    Route::get('/admin/xoa-thuong-hieu/{id}', "AdminThuongHieuController@xoaThuongHieu")->name('admin.xoaThuongHieu');
    Route::get('/admin/sua-thuong-hieu/{id}', "AdminThuongHieuController@suaThuongHieu")->name('admin.suaThuongHieu');
    Route::post('/admin/sua-thuong-hieu-p', "AdminThuongHieuController@suaThuongHieuP")->name('admin.suaThuongHieuP');


    // san pham 
    Route::get('/admin/them-san-pham', "AdminSanPhamController@themSanPham")->name('admin.themSanPham');
    Route::get('/admin/danh-sach-san-pham', "AdminSanPhamController@danhSachSanPham")->name('admin.danhSachSanPham');
    Route::post('/admin/them-san-pham-p', "AdminSanPhamController@themSanPhamP")->name('admin.themSanPhamP');
    Route::get('/admin/xoa-san-pham/{id}', "AdminSanPhamController@xoaSanPham")->name('admin.xoaSanPham');
    Route::get('/admin/sua-san-pham/{id}', "AdminSanPhamController@suaSanPham")->name('admin.suaSanPham');
    Route::post('/admin/sua-san-pham-p', "AdminSanPhamController@suaSanPhamP")->name('admin.suaSanPhamP');
});


// nhan vien va quan ly
Route::middleware('CheckLogin')->group(function () {


    // home 
    Route::get('/admin', "AdminHomeController@home")->name('admin.home');
    Route::get('/admin/404',function(){return view('admin.404');})->name('admin.404');

    // dang xuat 
    Route::get('/admin/dang-xuat', "AdminLoginController@dangXuat")->name('admin.dangXuat');


    // bai viet 
    Route::get('/admin/them-bai-viet', "AdminBaiVietController@themBaiViet")->name('admin.themBaiViet');
    Route::post('/admin/them-bai-viet-p', "AdminBaiVietController@themBaiVietP")->name('admin.themBaiVietP');
    Route::get('/admin/danh-sach-bai-viet', "AdminBaiVietController@danhSachBaiViet")->name('admin.danhSachBaiViet');
    Route::get('/admin/xoa-bai-viet/{id}', "AdminBaiVietController@xoaBaiViet")->name('admin.xoaBaiViet');
    Route::get('/admin/sua-bai-viet/{id}', "AdminBaiVietController@suaBaiViet")->name('admin.suaBaiViet');
    Route::post('/admin/sua-bai-viet-p', "AdminBaiVietController@suaBaiVietP")->name('admin.suaBaiVietP');


    // khach hang
    Route::get('/admin/them-khach-hang', "AdminKhachHangController@themKhachHang")->name('admin.themKhachHang');
    Route::get('/admin/danh-sach-khach-hang', "AdminKhachHangController@danhSachKhachHang")->name('admin.danhSachKhachHang');
    Route::post('/admin/them-khach-hang-p', "AdminKhachHangController@themKhachHangP")->name('admin.themKhachHangP');
    Route::get('/admin/xoa-khach-hang/{id}', "AdminKhachHangController@xoaKhachHang")->name('admin.xoaKhachHang');
    Route::get('/admin/sua-khach-hang/{id}', "AdminKhachHangController@suaKhachHang")->name('admin.suaKhachHang');
    Route::post('/admin/sua-khach-hang-p', "AdminKhachHangController@suaKhachHangP")->name('admin.suaKhachHangP');
});



// dang nhap 
Route::get('/admin/dang-nhap', "AdminLoginController@dangNhap")->name('admin.dangNhap');
Route::post('/admin/dang-nhap-p', "AdminLoginController@dangNhapP")->name('admin.dangNhapP');
