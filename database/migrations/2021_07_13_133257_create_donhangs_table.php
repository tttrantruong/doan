<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id('IDDonHang');
            $table->string('MaDonHang');
            $table->string('TrangThai');
            $table->unsignedBigInteger('SoLuong');
            $table->float("TongTien",13);
            $table->text('ChuThich');
            $table->unsignedBigInteger('KhachHangID');
            $table->foreign('KhachHangID')->references('IDKhachHang')->on('khach_hangs');
            $table->unsignedBigInteger('NhanVienID');
            $table->foreign('NhanVienID')->references('IDNhanVien')->on('nhan_viens');
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
        Schema::dropIfExists('donhangs');
    }
}
