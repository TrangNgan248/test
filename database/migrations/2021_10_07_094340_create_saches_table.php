<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('S_DanhmucId');
            $table->foreign('S_DanhmucId')->references('id')->on('danhmucsaches')->onDelete('cascade');
            $table->string('S_Ten');
            $table->string('S_Ma')->nullable();
            $table->string('S_Anh');
            $table->text('S_FileUpload')->nullable();
            $table->text('S_Mota')->nullable();
            $table->text('S_Chitiet')->nullable();
            $table->string('S_TuKhoa')->nullable();
            $table->integer('S_GiaBan');
            $table->binary('S_TrangThai')->nullable();
            $table->integer('S_SoLanXem')->nullable();
            $table->char('S_KichCo')->nullable();
            $table->unsignedBigInteger('S_NXBId')->nullable();
            $table->foreign('S_NXBId')->references('id')->on('nxbs')->onDelete('cascade');
            $table->integer('S_GiaNhap')->nullable();
            $table->integer('S_SoLuong')->nullable();
            $table->string('S_ViTri');
            $table->integer('S_NguyenBo')->nullable();
            $table->unsignedBigInteger('S_TacGiaId')->nullable();
            $table->foreign('S_TacGiaId')->references('id')->on('tacgias')->onDelete('cascade');
            $table->integer('S_CanNang')->nullable();
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
        Schema::dropIfExists('saches');
    }
}
