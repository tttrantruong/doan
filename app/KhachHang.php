<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $fillable = ["IDKhachHang",'MaKhachHang', 'TenKhachHang','SDTKhachHang', 'MailKhachHang','DiaChiKhachHang', 'Username', 'Password'   ];
}
