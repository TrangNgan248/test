<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhangs', function (Blueprint $table) {
            $table->id();
            $table->string('KH_TenTruyCap');
            $table->string('KH_MatKhau');
            $table->string('KH_HoTen');
            $table->string('KH_Email');
            $table->dateTime('KH_NgayBatDau');
            $table->binary('KH_TrangThai');
            $table->string('KH_DienThoai');
            $table->string('KH_DiaChi');
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
        Schema::dropIfExists('khachhangs');
    }
}
