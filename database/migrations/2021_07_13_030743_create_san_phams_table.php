<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id('IDSanPham');
            $table->string("MaSanPham");
            $table->string("TenSanPham");
            $table->string("ImgSanPham");
            $table->float("GiaBan",13);
            $table->unsignedBigInteger('SoLuong');
            $table->text('MoTa');
            $table->unsignedBigInteger('DanhMucID');
            $table->foreign('DanhMucID')->references('IDDanhMuc')->on('danh_mucs');
            $table->unsignedBigInteger('ThuongHieuID');
            $table->foreign('ThuongHieuID')->references('IDThuongHieu')->on('thuong_hieus');
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
        Schema::dropIfExists('san_phams');
    }
}
