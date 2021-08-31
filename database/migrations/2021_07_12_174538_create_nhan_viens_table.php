<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id('IDNhanVien');
            $table->string('MaNhanVien');
            $table->string('TenNhanVien');
            $table->string('ImgNhanVien');
            $table->string('SDTNhanVien');
            $table->string('MailNhanVien');
            $table->string('DiaChiNhanVien');
            $table->string('Role');
            $table->string('Username');
            $table->string('Password');
            $table->string('Active');
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
        Schema::dropIfExists('nhan_viens');
    }
}
