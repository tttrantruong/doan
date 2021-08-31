<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $fillable =['IDSanPham',"MaSanPham", "TenSanPham", "ImgSanPham","GiaBan", 'SoLuong','MoTa', 'DanhMucID',  'ThuongHieuID'  ];
}

