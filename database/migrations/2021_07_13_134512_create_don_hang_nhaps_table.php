<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_nhaps', function (Blueprint $table) {
            $table->id('IDDonHangNhap');
            $table->string('MaDonHangNhap');
            $table->unsignedBigInteger('SoLuong');
            $table->float('GiaNhap',13);
            $table->float('TongTien',13);
            $table->unsignedBigInteger('NhaCungCapID');
            $table->foreign('NhaCungCapID')->references('IDNhaCungCap')->on('nha_cung_caps');
            $table->unsignedBigInteger('SanPhamID');
            $table->foreign('SanPhamID')->references('IDSanPham')->on('san_phams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang_nhaps');
    }
}
