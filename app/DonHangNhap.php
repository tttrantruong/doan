<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHangNhap extends Model
{
    //
    protected $fillable = ['IDDonHangNhap','MaDonHangNhap','SoLuong', 'GiaNhap', 'TongTien', 'NhaCungCapID', 'SanPhamID'  ];
}
