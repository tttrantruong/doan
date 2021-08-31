<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id('IDBaiViet');
            $table->string('TieuDe');
            $table->string('ImgBaiViet');
            $table->text('NoiDung');
            $table->string('MoTaNgan');
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
        Schema::dropIfExists('bai_viets');
    }
}
