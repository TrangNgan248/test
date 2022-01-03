<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietthehangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietthehangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CTTH_TheHangId');
            $table->foreign('CTTH_TheHangId')->references('id')->on('thehangs')->onDelete('cascade');
            $table->unsignedBigInteger('CTTH_SachId');
            $table->foreign('CTTH_SachId')->references('id')->on('saches')->onDelete('cascade');
            $table->integer('CTTH_SoLuong');
            $table->integer('CTTH_ThanhTien');
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
        Schema::dropIfExists('chitietthehangs');
    }
}
