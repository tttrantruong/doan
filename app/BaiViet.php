<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    //
    protected $fillable = ['IDBaiViet', 'TieuDe','ImgBaiViet','NoiDung','NhanVienID','MoTaNgan' ];
}
