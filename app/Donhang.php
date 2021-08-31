<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    //
    protected $fillable = ['IDDonHang','MaDonHang', 'TrangThai', 'SoLuong',"TongTien", 'ChuThich', 'KhachHangID', 'NhanVienID'  ];
}

