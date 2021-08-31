<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaCungCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_caps', function (Blueprint $table) {
            $table->id("IDNhaCungCap");
            $table->string('MaNhaCungCap');
            $table->string('TenNhaCungCap');
            $table->string('SDTNhaCungCap');
            $table->string('MailNhaCungCap');
            $table->string('DiaChiNhaCungCap');
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
        Schema::dropIfExists('nha_cung_caps');
    }
}
