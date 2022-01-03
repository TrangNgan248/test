<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintucs', function (Blueprint $table) {
            $table->id();
            $table->text('TT_TieuDe');
            $table->string('TT_TacGia');
            $table->dateTime('TT_Ngay');
            $table->text('TT_MoTa');
            $table->text('TT_NoiDung');
            $table->string('TT_Anh');
            $table->text('TT_HienThi');
            $table->unsignedBigInteger('TT_NhomTin');
            $table->foreign('TT_NhomTin')->references('id')->on('nhomtins')->onDelete('cascade');
            $table->boolean('TT_TrangThai')->nullable();
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
        Schema::dropIfExists('tintucs');
    }
}
