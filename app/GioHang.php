<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    //
    protected $fillable = ['IDGioHang', 'SoLuong','ThanhTien', 'SanPhamID', 'KhachHangID' ];
}

