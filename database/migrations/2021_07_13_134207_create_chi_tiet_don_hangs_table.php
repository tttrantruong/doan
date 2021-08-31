<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id('IDChiTietDonHang');
            $table->unsignedBigInteger('SoLuong');
            $table->float('DonGia',13);
            $table->float('TongTien',13);
            $table->unsignedBigInteger('SanPhamID');
            $table->foreign('SanPhamID')->references('IDSanPham')->on('san_phams');
            $table->unsignedBigInteger('DonHangID');
            $table->foreign('DonHangID')->references('IDDonHang')->on('donhangs');
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
}
