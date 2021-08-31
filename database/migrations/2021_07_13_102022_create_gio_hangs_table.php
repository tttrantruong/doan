<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id('IDGioHang');
            $table->unsignedBigInteger('SoLuong');
            $table->float('ThanhTien',13);
            $table->unsignedBigInteger('SanPhamID');
            $table->foreign('SanPhamID')->references('IDSanPham')->on('san_phams');
            $table->unsignedBigInteger("KhachHangID");
            $table->foreign('KhachHangID')->references('IDKhachHang')->on('khach_hangs');
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
        Schema::dropIfExists('gio_hangs');
    }
}
