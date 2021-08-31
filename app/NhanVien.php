<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
   protected $fillable = ['IDNhanVien','MaNhanVien','TenNhanVien','ImgNhanVien','SDTNhanVien', 'MailNhanVien','DiaChiNhanVien', 'Role', 'Username','Password', 'Active'    ];
}