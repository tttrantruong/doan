<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuongHieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuong_hieus', function (Blueprint $table) {
            $table->id("IDThuongHieu");
            $table->string('TenThuongHieu');
            $table->string('ImgThuongHieu');
            $table->string('MoTaThuongHieu');
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
        Schema::dropIfExists('thuong_hieus');
    }
}
